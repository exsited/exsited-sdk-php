<?php

declare(strict_types=1);

namespace Exsited\Http;

use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use Closure;
use Exsited\Client\ApiResponse;
use Exsited\Client\Dto;
use Exsited\Client\ErrorType;
use Exsited\Client\RequestInfo;
use Exsited\Config\SdkConfig;
use Exsited\Errors\SdkError;
use Exsited\Errors\SdkUsageError;
use Exsited\Redaction;

/** HTTP execution: one client per instance, timeouts, TLS, retries, decoding. */
final class Transport
{
    /** Aliased from {@see RetryPolicy::SAFE_METHODS} so the two sets cannot drift: the
     *  stale-echo resend below is a second delivery of the same request. */
    private const RESENDABLE_METHODS = RetryPolicy::SAFE_METHODS;

    /** Read step size only; the total is bounded by `config->maxResponseBytes`. */
    private const RESPONSE_CHUNK_BYTES = 65536;

    /** Null once {@see closeTransport()} has run: the reference is the pool, so releasing
     *  it is the close. */
    private ?ClientInterface $httpClient;
    private readonly bool $ownsClient;
    private readonly RetryPolicy $retryPolicy;
    private readonly RequestFactoryInterface $requestFactory;
    private readonly StreamFactoryInterface $streamFactory;
    /** @var callable */
    private $onProgress;

    public function __construct(
        private readonly SdkConfig $config,
        ?RetryPolicy $retryPolicy = null,
        ?ClientInterface $httpClient = null,
        ?RequestFactoryInterface $requestFactory = null,
        ?StreamFactoryInterface $streamFactory = null,
        ?callable $onProgress = null,
    ) {
        $this->ownsClient = $httpClient === null;
        $this->httpClient = $httpClient ?? GuzzleClientFactory::create($config);
        $factory = GuzzleClientFactory::factory();
        $this->requestFactory = $requestFactory ?? $factory;
        $this->streamFactory = $streamFactory ?? $factory;
        $this->retryPolicy = $retryPolicy ?? RetryPolicy::fromConfig($config);
        $this->onProgress = $onProgress ?? static fn (string $m): null => null;
    }

    /** Materialise one logical request into the single representation every attempt sends.
     *  @param array<string,mixed>|null $params
     *  @param string|null $endpointTemplate e.g. `/api/{api_version}/accounts/{account_id}`
     *  @return array{method:string,url:string,params:array<string,mixed>|null,
     *  body:StreamInterface|null,contentType:string|null,replayable:bool,
     *  endpointTemplate:string|null} */
    public function materializeRequest(
        string $httpMethod,
        // Marked like the body: this API carries customer data in the query string, so a
        // trace holding a raw URL holds personal data.
        #[\SensitiveParameter] string $url,
        #[\SensitiveParameter] ?array $params = null,
        #[\SensitiveParameter] mixed $jsonBody = null,
        #[\SensitiveParameter] mixed $formData = null,
        #[\SensitiveParameter] mixed $files = null,
        ?string $endpointTemplate = null,
    ): array {
        $method = self::normalizeMethod($httpMethod);
        self::refuseUnsendableMultipartLabels($files, $formData);

        $formData = self::freezeFormPayload($formData);
        $finalUrl = self::mergeQuery($url, $params);
        [$bodyStream, $contentType] = $this->buildBody($jsonBody, $formData, $files);

        return [
            'method' => $method,
            'url' => $finalUrl,
            'params' => $params,
            'body' => $bodyStream,
            'contentType' => $contentType,
            // A body that cannot be returned to its start disables both the internal retry
            // and the client's replay. Asked of the stream that would be re-sent.
            'replayable' => $bodyStream === null || $bodyStream->isSeekable(),
            'endpointTemplate' => $endpointTemplate,
        ];
    }

    /** Return a materialised body to its start, so the same bytes can be sent again.
     *  @param array{body?:StreamInterface|null,replayable?:bool} $wire */
    public static function rewindMaterializedBody(array $wire): bool
    {
        if (($wire['replayable'] ?? false) !== true) {
            return false;
        }
        $body = $wire['body'] ?? null;
        return self::rewind($body instanceof StreamInterface ? $body : null);
    }

    /** Materialise and send in one step, for a caller holding a Transport directly.
     *  @param array<string,mixed>|null $params
     *  @param array<string,string>|null $headers
     *  @param array<string,string>|null $requestInfoHeaders
     *  @param string|null $responseFormat null takes the client's configured value
     *  @param class-string<Dto>|(Closure(array<string,mixed>): Dto)|null $dtoType */
    public function sendHttpRequest(
        string $httpMethod,
        #[\SensitiveParameter] string $url,
        #[\SensitiveParameter] ?array $params = null,
        #[\SensitiveParameter] mixed $jsonBody = null,
        #[\SensitiveParameter] mixed $formData = null,
        #[\SensitiveParameter] mixed $files = null,
        #[\SensitiveParameter] ?array $headers = null,
        #[\SensitiveParameter] ?array $requestInfoHeaders = null,
        #[\SensitiveParameter] mixed $requestInfoBody = null,
        ?string $responseFormat = null,
        string|Closure|null $dtoType = null,
        ?string $endpointTemplate = null,
    ): ApiResponse {
        self::refuseUnsendableHeaders($headers);
        return $this->sendMaterializedRequest(
            $this->materializeRequest($httpMethod, $url, $params, $jsonBody, $formData, $files, $endpointTemplate),
            $headers,
            $requestInfoHeaders,
            $requestInfoBody,
            $responseFormat,
            $dtoType,
        );
    }

    /** Send an already-materialised request, retrying it as the policy allows.
     *  @param array{method:string,url:string,params:array<string,mixed>|null,
     *  body:StreamInterface|null,contentType:string|null,replayable:bool,
     *  endpointTemplate:string|null} $wire
     *  @param array<string,string>|null $headers
     *  @param array<string,string>|null $requestInfoHeaders
     *  @param class-string<Dto>|(Closure(array<string,mixed>): Dto)|null $dtoType */
    public function sendMaterializedRequest(
        array $wire,
        #[\SensitiveParameter] ?array $headers = null,
        #[\SensitiveParameter] ?array $requestInfoHeaders = null,
        #[\SensitiveParameter] mixed $requestInfoBody = null,
        ?string $responseFormat = null,
        string|Closure|null $dtoType = null,
    ): ApiResponse {
        self::refuseUnsendableHeaders($headers);

        $method = $wire['method'];
        $finalUrl = $wire['url'];
        $params = $wire['params'];
        $bodyStream = $wire['body'];
        $contentType = $wire['contentType'];
        $replayable = $wire['replayable'];
        $endpointTemplate = $wire['endpointTemplate'];

        $request = $this->requestFactory->createRequest($method, $finalUrl);
        foreach ($headers ?? [] as $name => $value) {
            $request = $request->withHeader((string) $name, $value);
        }
        if ($contentType !== null) {
            if (self::boundaryParameter($contentType) === null) {
                // A body with no framing of its own, so a caller refining the label
                // (a charset, a vendor JSON type) is left alone.
                if (!$request->hasHeader('Content-Type')) {
                    $request = $request->withHeader('Content-Type', $contentType);
                }
            } else {
                if ($request->hasHeader('Content-Type')) {
                    self::requireBodyOwnedMediaType($request->getHeaderLine('Content-Type'), $contentType);
                }
                // The value the body was framed with is the value that goes out, exactly
                // once: `withHeader()` replaces any equivalent-but-differently-spelled one.
                $request = $request->withHeader('Content-Type', $contentType);
            }
        }
        if ($bodyStream !== null) {
            $request = $request->withBody($bodyStream);
        }

        $started = hrtime(true);
        $attempt = 0;
        $requestsSent = 0;
        $staleEchoResent = false;
        $lastException = null;

        while ($attempt < $this->retryPolicy->maxAttempts) {
            $attempt++;
            $requestsSent++;
            // The declared template, not the resolved URL: the resolved path carries the
            // record id and the query string carries what was searched for.
            ($this->onProgress)("{$method} " . ($endpointTemplate ?? '(endpoint not declared)')
                . " sending (attempt {$attempt}/{$this->retryPolicy->maxAttempts})");

            try {
                $raw = $this->connectedClient()->sendRequest($request);
            } catch (ResponseTooLargeException $tooLarge) {
                // The cap fired inside the client, so the body was stopped rather than
                // measured. Never retried: the next attempt reads the same body again.
                throw $this->refuseOversizedBody(
                    $this->requestInfo(
                        $method,
                        $finalUrl,
                        $params,
                        $requestsSent,
                        $this->grantedAttempts($staleEchoResent),
                        $started,
                        $requestInfoHeaders,
                        $requestInfoBody,
                        $endpointTemplate
                    ),
                    $tooLarge->cap,
                    $tooLarge->declaredLength,
                    $tooLarge->receivedBytes,
                    true
                );
            } catch (ClientExceptionInterface $exception) {
                $lastException = $exception;
                if ($attempt >= $this->retryPolicy->maxAttempts
                    || !$replayable
                    || !$this->retryPolicy->shouldRetryAfterException($exception, $method)
                    || !self::rewind($bodyStream)) {
                    break;
                }
                $delay = $this->retryPolicy->computeBackoffSeconds($attempt);
                ($this->onProgress)(get_class($exception) . "; retrying in " . round($delay, 1) . 's');
                self::sleep($delay);
                continue;
            }

            $status = $raw->getStatusCode();
            if ($attempt < $this->retryPolicy->maxAttempts
                && $replayable
                && $this->retryPolicy->shouldRetryStatusCode($status, $method)
                && self::rewind($bodyStream)) {
                $delay = $this->retryPolicy->computeBackoffSeconds($attempt, $raw->getHeaderLine('Retry-After') ?: null);
                ($this->onProgress)("{$status}; retrying in " . round($delay, 1) . 's');
                // An abandoned attempt's body is never read; closing it is what lets an
                // injected client that streams reuse the connection.
                $raw->getBody()->close();
                self::sleep($delay);
                continue;
            }

            $requestInfo = $this->requestInfo(
                $method,
                $finalUrl,
                $params,
                $requestsSent,
                $this->grantedAttempts($staleEchoResent),
                $started,
                $requestInfoHeaders,
                $requestInfoBody,
                $endpointTemplate
            );
            try {
                $body = $this->readBodyWithinTheCap($raw, $requestInfo);
            } catch (SdkError $refusal) {
                // Already classified and carrying this call's RequestInfo. Never retried.
                throw $refusal;
            } catch (\Exception $failure) {
                // A stall mid-body raises a plain RuntimeException, which the send guard above never sees; the
                // request was fully sent, so the API may already have applied the write.
                $lastException = $failure;
                if ($attempt >= $this->retryPolicy->maxAttempts
                    || !$replayable
                    || !$this->retryPolicy->shouldRetryAfterResponseBodyFailure($method)
                    || !self::rewind($bodyStream)) {
                    break;
                }
                $delay = $this->retryPolicy->computeBackoffSeconds($attempt);
                ($this->onProgress)(get_class($failure) . "; retrying in " . round($delay, 1) . 's');
                self::sleep($delay);
                continue;
            }
            $apiResponse = $this->buildApiResponse(
                $raw,
                $body,
                $requestInfo,
                $responseFormat ?? $this->config->responseFormat,
                $dtoType
            );

            if (!$staleEchoResent
                && $replayable
                && in_array($method, self::RESENDABLE_METHODS, true)
                && $this->detectStaleParameterEcho($apiResponse, $params)
                && self::rewind($bodyStream)) {
                $staleEchoResent = true;
                $attempt--;
                $this->discardPooledConnections();
                continue;
            }

            return $apiResponse;
        }

        throw $this->buildTransportError(
            $lastException,
            $method,
            $finalUrl,
            $params,
            $requestsSent,
            $this->grantedAttempts($staleEchoResent),
            $started,
            $requestInfoHeaders,
            $requestInfoBody,
            $endpointTemplate
        );
    }

    /** Release the HTTP client, and with it the idle keep-alive sockets it was holding. */
    public function closeTransport(): void
    {
        $this->httpClient = null;
    }

    /** The client to send on, or a usage error naming the close that released it. */
    private function connectedClient(): ClientInterface
    {
        if ($this->httpClient === null) {
            throw new SdkUsageError(
                'transport is closed: closeTransport() has already released the connection pool, '
                . 'so this request was not sent; build a new Transport to keep talking to the application'
            );
        }
        return $this->httpClient;
    }

    private function grantedAttempts(bool $staleEchoResent): int
    {
        return $this->retryPolicy->maxAttempts + ($staleEchoResent ? 1 : 0);
    }

    /** The one multipart media type this SDK builds and the one it will accept back. */
    private const MULTIPART_MEDIA_TYPE = 'multipart/form-data';

    /** Only a body that owns a boundary is policed, and by equality: exactly `multipart/form-data`
     *  with one `boundary`, since a mismatched or repeated one is read two ways by two servers. */
    private static function requireBodyOwnedMediaType(string $callerType, string $materialisedType): void
    {
        $ownBoundary = self::boundaryParameter($materialisedType);
        if ($ownBoundary === null) {
            return;
        }
        $parsed = self::parseMediaType($callerType);
        if ($parsed !== null) {
            [$mediaType, $parameters] = $parsed;
            if ($mediaType === self::MULTIPART_MEDIA_TYPE
                && count($parameters) === 1
                && $parameters[0][0] === 'boundary'
                && $parameters[0][1] === $ownBoundary) {
                return;
            }
        }
        throw new SdkUsageError(
            'headers: a Content-Type was passed for a request whose body is multipart, and the '
            . 'body owns its own boundary - so the header would describe framing the bytes do '
            . 'not use and no server could parse the result. Drop the Content-Type header and '
            . 'let the SDK name the body, or pass back exactly the type on the materialised '
            . "request's contentType: one multipart/form-data with one boundary parameter, "
            . 'naming the delimiter the bytes use'
        );
    }

    /** Enumerated rather than matched with one pattern because every parameter has to be
     *  seen: a repeated `boundary` is what a "find the boundary" regex cannot report.
     *  @return array{string,list<array{string,string}>}|null */
    private static function parseMediaType(string $raw): ?array
    {
        $segments = explode(';', $raw);
        $mediaType = strtolower(trim((string) array_shift($segments)));
        if ($mediaType === '') {
            return null;
        }
        $parameters = [];
        foreach ($segments as $segment) {
            $segment = trim($segment);
            if ($segment === '') {
                return null;
            }
            $equals = strpos($segment, '=');
            if ($equals === false || $equals === 0) {
                return null;
            }
            $name = strtolower(trim(substr($segment, 0, $equals)));
            $value = trim(substr($segment, $equals + 1));
            if (str_starts_with($value, '"')) {
                if (strlen($value) < 2 || !str_ends_with($value, '"')) {
                    return null;
                }
                $value = substr($value, 1, -1);
            }
            $parameters[] = [$name, $value];
        }
        return [$mediaType, $parameters];
    }

    private static function boundaryParameter(string $contentType): ?string
    {
        $parsed = self::parseMediaType($contentType);
        if ($parsed === null) {
            return null;
        }
        foreach ($parsed[1] as [$name, $value]) {
            if ($name === 'boundary' && $value !== '') {
                return $value;
            }
        }
        return null;
    }

    /** Three ceilings - source bytes, multipart framing alone and the finished wire body - plus a time
     *  bound on preparation, which no network timeout can see.
     *  @return array{StreamInterface|null,string|null} */
    private function buildBody(#[\SensitiveParameter] mixed $jsonBody, #[\SensitiveParameter] mixed $formData, #[\SensitiveParameter] mixed $files): array
    {
        $startedNs = hrtime(true);
        if ($jsonBody !== null) {
            // A string is already JSON: re-encoding would produce a JSON string literal
            // ("{\"a\":1}") rather than the object.
            if (is_string($jsonBody)) {
                $encoded = $jsonBody;
            } else {
                $encoded = json_encode($jsonBody, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
                if ($encoded === false) {
                    throw new SdkUsageError('json_body is not JSON-serialisable: ' . json_last_error_msg());
                }
            }
            // Source and wire are the same bytes for JSON; both ceilings are still named so
            // the refusal points at whichever one an operator lowered.
            $this->requireWithinCeiling('json_body', strlen($encoded), $this->config->maxRequestSourceBytes, 'maxRequestSourceBytes');
            $this->requireWithinCeiling('the request body', strlen($encoded), $this->config->maxRequestBytes, 'maxRequestBytes');
            return [$this->streamFactory->createStream($encoded), 'application/json'];
        }
        if ($files !== null) {
            // Refused again here, not only in the pre-flight: a caller may hold a Transport
            // directly.
            self::refuseUnsendableMultipartLabels($files, $formData);
            $elements = [];
            $sourceBytes = 0;
            foreach (self::normalizePairs($formData) as [$name, $value]) {
                $elements[] = [
                    'name' => self::escapeMultipartLabel($name),
                    'contents' => $this->materialisePartContents($value, $sourceBytes, $startedNs),
                ];
            }
            foreach (self::normalizePairs($files) as [$name, $value]) {
                $elements[] = $this->multipartFileElement($name, $value, $sourceBytes, $startedNs);
            }
            $boundary = $this->chooseMultipartBoundary($elements, self::candidateBoundary(), $startedNs);
            $stream = new MultipartStream($elements, $boundary);
            $total = $stream->getSize();
            if ($total === null) {
                // A body whose length cannot be measured cannot be held to any ceiling.
                throw new SdkUsageError(
                    'files: the multipart body could not report its own length, so it cannot be held '
                    . 'to max_request_bytes and was not sent'
                );
            }
            $this->requireWithinCeiling(
                'the multipart framing (part headers, delimiters and CRLFs)',
                max(0, $total - $sourceBytes),
                $this->config->maxMultipartOverheadBytes,
                'maxMultipartOverheadBytes'
            );
            $this->requireWithinCeiling('the request body', $total, $this->config->maxRequestBytes, 'maxRequestBytes');
            return [$stream, 'multipart/form-data; boundary=' . $stream->getBoundary()];
        }
        if ($formData !== null) {
            // The wire body is the caller's text percent-encoded, which can be three times
            // longer, so both are counted.
            $this->requireWithinCeiling('form_data', self::formSourceBytes($formData), $this->config->maxRequestSourceBytes, 'maxRequestSourceBytes');
            $encoded = is_string($formData) ? $formData : http_build_query($formData);
            $this->requireWithinCeiling('the request body', strlen($encoded), $this->config->maxRequestBytes, 'maxRequestBytes');
            return [$this->streamFactory->createStream($encoded), 'application/x-www-form-urlencoded'];
        }
        return [null, null];
    }

    private const BOUNDARY_ATTEMPTS = 3;

    /** A fresh delimiter candidate: 160 bits from a CSPRNG, so a caller cannot predict one
     *  and plant it in a part. */
    private static function candidateBoundary(): callable
    {
        return static fn (): string => bin2hex(random_bytes(20));
    }

    /** Guzzle generates a boundary without looking at the content it delimits; the parts are
     *  frozen by the time this runs, so the collision is checked rather than estimated.
     *  @param list<array<string,mixed>> $elements
     *  @param callable(): string $candidate */
    private function chooseMultipartBoundary(array $elements, callable $candidate, int $startedNs): string
    {
        for ($attempt = 1; $attempt <= self::BOUNDARY_ATTEMPTS; $attempt++) {
            $boundary = $candidate();
            if (!$this->multipartDelimiterAppears($boundary, $elements, $startedNs)) {
                return $boundary;
            }
        }
        throw new SdkError(
            'the multipart delimiter could not be made unique: ' . self::BOUNDARY_ATTEMPTS . ' generated '
            . 'candidates each already appeared in the request, so no framing this SDK can write would '
            . 'be unambiguous and nothing was sent',
            errorType: ErrorType::Unknown,
        );
    }

    /** Scanned with an overlap of one byte less than the delimiter, so an occurrence
     *  straddling two chunks is still seen, then rewound for the body.
     *  @param list<array<string,mixed>> $elements */
    private function multipartDelimiterAppears(string $boundary, array $elements, int $startedNs): bool
    {
        foreach ($elements as $element) {
            foreach (['name', 'filename'] as $label) {
                if (is_string($element[$label] ?? null) && str_contains($element[$label], $boundary)) {
                    return true;
                }
            }
            foreach ($element['headers'] ?? [] as $name => $value) {
                if (str_contains((string) $name, $boundary) || str_contains((string) $value, $boundary)) {
                    return true;
                }
            }
            $contents = $element['contents'] ?? null;
            if (is_string($contents)) {
                if (str_contains($contents, $boundary)) {
                    return true;
                }
                continue;
            }
            if ($contents instanceof StreamInterface && $this->delimiterInStream($contents, $boundary, $startedNs)) {
                return true;
            }
        }
        return false;
    }

    private function delimiterInStream(StreamInterface $stream, string $boundary, int $startedNs): bool
    {
        $overlap = max(0, strlen($boundary) - 1);
        $carry = '';
        $stream->rewind();
        try {
            while (!$stream->eof()) {
                $this->requirePreparationTime($startedNs);
                $chunk = $stream->read(self::SPOOL_CHUNK_BYTES);
                if ($chunk === '') {
                    break;
                }
                $window = $carry . $chunk;
                if (str_contains($window, $boundary)) {
                    return true;
                }
                $carry = $overlap > 0 ? substr($window, -$overlap) : '';
            }
        } finally {
            $stream->rewind();
        }
        return false;
    }

    /** The caller's own bytes in a URL-encoded form, before percent-encoding. */
    private static function formSourceBytes(#[\SensitiveParameter] mixed $formData): int
    {
        if (is_string($formData)) {
            return strlen($formData);
        }
        $bytes = 0;
        foreach (self::normalizePairs($formData) as [$name, $value]) {
            $bytes += strlen($name) + strlen(is_array($value) ? (string) json_encode($value) : (string) $value);
        }
        return $bytes;
    }

    private function requireWithinCeiling(string $what, int $measured, int $ceiling, string $setting): void
    {
        if ($measured <= $ceiling) {
            return;
        }
        throw new SdkUsageError(
            "{$what} is {$measured} bytes, over the {$ceiling}-byte {$setting} ceiling, so the request "
            . "was not sent - raise {$setting} on the client if a request this large is expected"
        );
    }

    /** The preparation budget: the same `timeoutSeconds` one attempt is given, checked
     *  between copied chunks. */
    private function requirePreparationTime(int $startedNs): void
    {
        $budget = $this->config->timeoutSeconds;
        if ((hrtime(true) - $startedNs) / 1_000_000_000 <= $budget) {
            return;
        }
        throw new SdkError(
            "building the request body took longer than the {$budget}s timeout_seconds budget, so it "
            . 'was abandoned before anything was sent - raise timeout_seconds, or hand over a source '
            . 'that can be read in that time',
            errorType: ErrorType::Timeout,
        );
    }

    /** Every live form value resolved once to the text that will be sent, before the OAuth2 grant, so
     *  a `__toString()` answers once per request and diagnostics match the wire. Idempotent. */
    public static function freezeFormPayload(#[\SensitiveParameter] mixed $formData): mixed
    {
        if ($formData === null || is_scalar($formData)) {
            return $formData;
        }
        if (is_array($formData)) {
            $frozen = [];
            foreach ($formData as $name => $value) {
                $frozen[$name] = self::freezeFormPayload($value);
            }
            return $frozen;
        }
        if ($formData instanceof StreamInterface || is_resource($formData)) {
            // A borrowed stream is a multipart part, copied where the body is built. Reading
            // it here would consume the bytes that body needs.
            return $formData;
        }
        if (method_exists($formData, '__toString')) {
            return (string) $formData;
        }
        return $formData;
    }

    /** @return list<array{string,mixed}> */
    private static function normalizePairs(mixed $payload): array
    {
        if ($payload === null) {
            return [];
        }
        if (is_array($payload)) {
            if (array_is_list($payload) && $payload !== [] && is_array($payload[0]) && count($payload[0]) === 2) {
                return array_map(static fn (array $p): array => [(string) array_values($p)[0], array_values($p)[1]], $payload);
            }
            $pairs = [];
            foreach ($payload as $name => $value) {
                $pairs[] = [(string) $name, $value];
            }
            return $pairs;
        }
        return [];
    }

    /** @return array{name:string,contents:mixed,filename?:string,headers?:array<string,string>} */
    private function multipartFileElement(string $name, mixed $value, int &$sourceBytes, int $startedNs): array
    {
        if (is_array($value)) {
            $vals = array_values($value);
            $element = [
                'name' => self::escapeMultipartLabel($name),
                'contents' => $this->materialisePartContents($vals[1] ?? '', $sourceBytes, $startedNs),
                'filename' => self::escapeMultipartLabel(is_string($vals[0] ?? null) ? $vals[0] : $name),
            ];
            if (isset($vals[2]) && is_string($vals[2])) {
                $element['headers'] = ['Content-Type' => $vals[2]];
            }
            return $element;
        }
        return [
            'name' => self::escapeMultipartLabel($name),
            'contents' => $this->materialisePartContents($value, $sourceBytes, $startedNs),
            'filename' => self::escapeMultipartLabel($name),
        ];
    }

    /** @var array<string,string> Bytes that forge a part header if they reach a multipart
     *  label: CR and LF open a new header line, NUL truncates the block downstream. */
    private const MULTIPART_FORBIDDEN_BYTES = ['CR' => "\r", 'LF' => "\n", 'NUL' => "\0"];

    public static function refuseUnsendableMultipartLabels(
        #[\SensitiveParameter] mixed $files,
        #[\SensitiveParameter] mixed $formData,
    ): void {
        // Only a multipart body has part labels; without `files` the form is percent-encoded
        // by http_build_query(), where a line break cannot forge anything.
        if ($files === null) {
            return;
        }
        foreach (self::normalizePairs($formData) as [$name, $_]) {
            self::refuseMultipartHeaderBytes('field name', $name, $name);
        }
        foreach (self::normalizePairs($files) as [$name, $value]) {
            self::refuseMultipartHeaderBytes('field name', $name, $name);
            if (!is_array($value)) {
                continue;
            }
            $vals = array_values($value);
            if (is_string($vals[0] ?? null)) {
                self::refuseMultipartHeaderBytes('filename', $vals[0], $name);
            }
            if (is_string($vals[2] ?? null)) {
                self::refuseMultipartHeaderBytes('Content-Type', $vals[2], $name);
            }
        }
    }

    private static function refuseMultipartHeaderBytes(
        string $label,
        #[\SensitiveParameter] string $value,
        string $fieldName,
    ): void {
        foreach (self::MULTIPART_FORBIDDEN_BYTES as $named => $byte) {
            $offset = strpos($value, $byte);
            if ($offset === false) {
                continue;
            }
            throw new SdkUsageError(
                "multipart {$label} for field '" . self::printableHeaderName($fieldName) . "': carries "
                . "{$named} at byte offset {$offset}, and a line break or a NUL in a part label forges "
                . 'the part headers of an authenticated request. Strip it before uploading. The value '
                . 'is not shown: a part label - an upload filename above all - is often not text this '
                . 'caller wrote'
            );
        }
    }

    /** `"` and `\` are percent-escaped, as RFC 6266 and browsers send them; escaping `\` also keeps
     *  Guzzle's `basename()`, which splits on it on Windows only, from changing a label per platform. */
    private static function escapeMultipartLabel(string $label): string
    {
        return str_replace(['\\', '"'], ['%5C', '%22'], $label);
    }

    /** A borrowed handle is copied, not referenced: `MultipartStream` would `fclose()` the caller's
     *  handle, and a live handle is no snapshot of what was checked. */
    private function materialisePartContents(mixed $value, int &$sourceBytes, int $startedNs): mixed
    {
        if (is_resource($value)) {
            return $this->spoolBorrowedHandle($value, $sourceBytes, $startedNs);
        }
        if ($value instanceof StreamInterface) {
            return $this->spoolBorrowedStream($value, $sourceBytes, $startedNs);
        }
        $text = (string) $value;
        $sourceBytes += strlen($text);
        $this->requireWithinCeiling(
            'the request payload',
            $sourceBytes,
            $this->config->maxRequestSourceBytes,
            'maxRequestSourceBytes'
        );
        return $text;
    }

    /** Copy step size only; the total is bounded by `maxSpoolBytes` and the running
     *  `maxRequestSourceBytes` aggregate. */
    private const SPOOL_CHUNK_BYTES = 65536;

    /** An empty spool this SDK owns: memory first, spilling to a temporary file PHP removes
     *  when the last reference goes. */
    private static function newSpool(): StreamInterface
    {
        return Utils::streamFor(Utils::tryFopen('php://temp', 'r+'));
    }

    /** Reads from where the caller left the handle, which is never closed; each read asks for what the
     *  ceiling has left plus one, so at most one byte past it is held.
     *  @param resource $handle */
    private function spoolBorrowedHandle($handle, int &$sourceBytes, int $startedNs): StreamInterface
    {
        $spool = self::newSpool();
        $copied = 0;
        while (!feof($handle)) {
            $this->requirePreparationTime($startedNs);
            $chunk = fread($handle, $this->nextSpoolRead($copied, $sourceBytes));
            if ($chunk === false) {
                throw new SdkUsageError(
                    'files: a supplied resource could not be read, so the request body could not be '
                    . 'built; check the handle is still open and readable'
                );
            }
            if ($chunk === '') {
                break;
            }
            $copied += strlen($chunk);
            $this->requireSpoolWithinCeilings($copied, $sourceBytes + $copied);
            $spool->write($chunk);
        }
        $sourceBytes += $copied;
        $spool->rewind();
        return $spool;
    }

    /** The same bounded copy for a borrowed PSR-7 stream: never closed, never rewound on the
     *  caller's behalf. */
    private function spoolBorrowedStream(StreamInterface $stream, int &$sourceBytes, int $startedNs): StreamInterface
    {
        $spool = self::newSpool();
        $copied = 0;
        while (!$stream->eof()) {
            $this->requirePreparationTime($startedNs);
            $chunk = $stream->read($this->nextSpoolRead($copied, $sourceBytes));
            if ($chunk === '') {
                break;
            }
            $copied += strlen($chunk);
            $this->requireSpoolWithinCeilings($copied, $sourceBytes + $copied);
            $spool->write($chunk);
        }
        $sourceBytes += $copied;
        $spool->rewind();
        return $spool;
    }

    /** What either ceiling has left, plus the one byte that proves the source went past it. */
    private function nextSpoolRead(int $copied, int $sourceBytes): int
    {
        $remaining = min(
            $this->config->maxSpoolBytes - $copied,
            $this->config->maxRequestSourceBytes - ($sourceBytes + $copied),
        );
        return max(1, min(self::SPOOL_CHUNK_BYTES, $remaining + 1));
    }

    private function requireSpoolWithinCeilings(int $copied, int $aggregate): void
    {
        $this->requireWithinCeiling('a supplied stream', $copied, $this->config->maxSpoolBytes, 'maxSpoolBytes');
        $this->requireWithinCeiling('the request payload', $aggregate, $this->config->maxRequestSourceBytes, 'maxRequestSourceBytes');
    }

    /** @param array<string,mixed>|null $params
     *  @param array<string,string>|null $requestInfoHeaders */
    private function requestInfo(
        string $method,
        #[\SensitiveParameter] string $url,
        #[\SensitiveParameter] ?array $params,
        int $attempt,
        int $maxAttempts,
        int $started,
        #[\SensitiveParameter] ?array $requestInfoHeaders,
        #[\SensitiveParameter] mixed $requestInfoBody,
        ?string $endpointTemplate = null,
    ): RequestInfo {
        return new RequestInfo(
            clientName: $this->config->clientName(),
            apiVersion: $this->config->apiVersion,
            httpMethod: $method,
            url: $url,
            queryParams: $params ?? [],
            body: $requestInfoBody,
            headers: $requestInfoHeaders ?? [],
            attemptCount: $attempt,
            maxAttempts: $maxAttempts,
            elapsedSeconds: self::elapsed($started),
            endpointTemplate: $endpointTemplate,
        );
    }

    /** Each read asks for what the cap has left plus one, so the string holds at most `cap + 1`; this
     *  bounds an injected PSR-18 client, which has usually received the whole body already. */
    private function readBodyWithinTheCap(ResponseInterface $raw, RequestInfo $requestInfo): string
    {
        $cap = $this->config->maxResponseBytes;
        $declaredHeader = $raw->getHeaderLine('Content-Length');
        $declared = $declaredHeader !== '' && ctype_digit($declaredHeader) ? (int) $declaredHeader : null;
        if ($declared !== null && $declared > $cap) {
            $raw->getBody()->close();
            throw $this->refuseOversizedBody($requestInfo, $cap, $declared);
        }
        $stream = $raw->getBody();
        $body = '';
        while (!$stream->eof()) {
            $chunk = $stream->read(max(1, min(self::RESPONSE_CHUNK_BYTES, $cap - strlen($body) + 1)));
            if ($chunk === '') {
                // A stream with nothing more to give that has not set its own eof flag;
                // without this the loop spins forever.
                break;
            }
            $body .= $chunk;
            if (strlen($body) > $cap) {
                $stream->close();
                throw $this->refuseOversizedBody($requestInfo, $cap, $declared);
            }
        }
        return $body;
    }

    private function refuseOversizedBody(
        RequestInfo $requestInfo,
        int $cap,
        ?int $declared,
        ?int $receivedBytes = null,
        bool $stoppedInFlight = false,
    ): SdkError {
        $size = $declared !== null ? " (Content-Length {$declared})" : '';
        // Two different outcomes: the client this SDK builds really did abandon the
        // transfer, an injected one had usually finished receiving already.
        $outcome = $stoppedInFlight
            ? ($declared !== null
                ? 'so the transfer was abandoned before the body was downloaded'
                : "so the transfer was stopped after {$receivedBytes} byte(s)")
            : 'so it was not read into a string. The response had already been received by '
                . 'the HTTP client, which is where an injected client decides that';
        // No resolved URL: this message is an exception's default output, and the URL
        // carries the record id and the query values.
        return new SdkError(
            "the response body is over the {$cap}-byte maxResponseBytes cap{$size}, "
            . "{$outcome} - raise "
            . 'maxResponseBytes on the client if a body this large is expected',
            errorType: ErrorType::Unknown,
            requestInfo: $requestInfo,
            // Not chained: PHP records every frame's arguments in a trace, so a reachable
            // cause from below the request boundary would expose the bearer token.
        );
    }

    /** @param class-string<Dto>|(Closure(array<string,mixed>): Dto)|null $dtoType */
    private function buildApiResponse(
        ResponseInterface $raw,
        string $body,
        RequestInfo $requestInfo,
        string $responseFormat,
        string|Closure|null $dtoType,
    ): ApiResponse {
        $contentType = $raw->getHeaderLine('Content-Type');
        $status = $raw->getStatusCode();
        return new ApiResponse(
            statusCode: $status,
            data: self::decodeBodyText($body, $status, $contentType),
            headers: self::flattenHeaders($raw),
            contentType: $contentType ?: null,
            bodyText: self::bodyTextOrNull($body, $status, $contentType),
            responseFormat: $responseFormat,
            dtoType: $dtoType,
            requestInfo: $requestInfo,
            errorType: ErrorType::classify($status),
        );
    }

    /** Guzzle words a connection failure with the resolved URL in it, so its message is kept
     *  off the default output and reached only through `getErrorMessages()`.
     *  @param array<string,mixed>|null $params
     *  @param array<string,string>|null $requestInfoHeaders */
    private function buildTransportError(
        // The caught exception's own trace holds the PSR-7 request, headers included.
        #[\SensitiveParameter] ?\Throwable $exception,
        string $method,
        #[\SensitiveParameter] string $url,
        #[\SensitiveParameter] ?array $params,
        int $attempt,
        int $maxAttempts,
        int $started,
        #[\SensitiveParameter] ?array $requestInfoHeaders,
        #[\SensitiveParameter] mixed $requestInfoBody,
        ?string $endpointTemplate = null,
    ): SdkError {
        $timedOut = $exception !== null && RetryPolicy::isTimeout($exception);
        $requestInfo = $this->requestInfo(
            $method,
            $url,
            $params,
            $attempt,
            $maxAttempts,
            $started,
            $requestInfoHeaders,
            $requestInfoBody,
            $endpointTemplate
        );
        $label = $timedOut ? 'timed out' : 'failed';
        $cause = $exception !== null ? get_class($exception) : 'no exception recorded';
        return new SdkError(
            "the request {$label} after {$attempt} attempt(s) ({$cause}); the HTTP client's own "
            . "message names the resolved URL, so it is on getErrorMessages() rather than here",
            errorType: $timedOut ? ErrorType::Timeout : ErrorType::Network,
            requestInfo: $requestInfo,
            errors: $exception !== null ? [Redaction::redactText($exception->getMessage())] : [],
        );
    }

    /** @param array<string,mixed>|null $params */
    private function detectStaleParameterEcho(
        ApiResponse $response,
        #[\SensitiveParameter] ?array $params,
    ): bool
    {
        // `map`, never `data`: the API's own error envelope is there whatever presentation
        // the caller asked for.
        if ($response->statusCode !== 400 || !is_array($response->map)) {
            return false;
        }
        // `errors[]` first, whatever the `error` code says: gating on
        // `error == unknown_parameter` would miss a shifted 400 carrying a structured block.
        $named = self::extractErrorFields($response->map);
        if ($named === [] && ($response->map['error'] ?? null) === self::UNKNOWN_PARAMETER_ERROR) {
            // The one code whose message wording is stable enough to read field names out of.
            $named = self::parseUnknownParameterMessage($response->map);
        }
        if ($named === []) {
            return false;
        }
        $sent = array_map(static fn ($n): string => strtolower((string) $n), array_keys($params ?? []));
        if ($sent === []) {
            // With nothing sent, "the named field is not ours" collapses to "any 400
            // carrying errors[]".
            return false;
        }
        return array_intersect($named, $sent) === [];
    }

    /** The error code whose `message` names its parameters in a fixed form. */
    private const UNKNOWN_PARAMETER_ERROR = 'unknown_parameter';

    /** Lowered, so an API answering `Limit` matches the `limit` that was sent. Both shapes
     *  the API sends: a list of `{"field": "..."}` entries, and a mapping keyed by field.
     *  @param array<string,mixed> $body
     *  @return list<string> */
    private static function extractErrorFields(array $body): array
    {
        $entries = $body['errors'] ?? null;
        if (!is_array($entries)) {
            return [];
        }
        $fields = [];
        if (array_is_list($entries)) {
            foreach ($entries as $entry) {
                if (is_array($entry) && isset($entry['field']) && $entry['field'] !== '') {
                    $fields[] = strtolower(trim((string) $entry['field']));
                }
            }
        } else {
            foreach (array_keys($entries) as $fieldName) {
                $fields[] = strtolower(trim((string) $fieldName));
            }
        }
        return array_values(array_unique(array_filter($fields, static fn (string $n): bool => $n !== '')));
    }

    /** The fallback for an `unknown_parameter` body carrying no `errors[]`.
     *  @param array<string,mixed> $body
     *  @return list<string> */
    private static function parseUnknownParameterMessage(array $body): array
    {
        $message = (string) ($body['message'] ?? '');
        $marker = 'unknown query parameter(s):';
        $pos = stripos($message, $marker);
        if ($pos === false) {
            return [];
        }
        $fields = [];
        foreach (explode(',', substr($message, $pos + strlen($marker))) as $item) {
            if (preg_match('/[A-Za-z0-9_-]+/', $item, $m) === 1) {
                $fields[] = strtolower($m[0]);
            }
        }
        return array_values(array_unique($fields));
    }

    private function discardPooledConnections(): void
    {
        if ($this->ownsClient) {
            $this->httpClient = GuzzleClientFactory::create($this->config);
        }
    }

    public static function decodeResponseBody(ResponseInterface $raw): mixed
    {
        return self::decodeBodyText((string) $raw->getBody(), $raw->getStatusCode(), $raw->getHeaderLine('Content-Type'));
    }

    /** Takes bytes rather than a response so one read of the stream feeds both this and
     *  bodyTextOrNull(). */
    public static function decodeBodyText(string $body, int $statusCode, string $rawContentType): mixed
    {
        if ($statusCode === 204 || $body === '') {
            return null;
        }
        $contentType = strtolower($rawContentType);
        if (self::isJsonMediaType($contentType)) {
            $decoded = json_decode($body, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                return $decoded;
            }
            $stripped = str_starts_with($body, "\xEF\xBB\xBF") ? substr($body, 3) : $body;
            $decoded = json_decode($stripped, true);
            return json_last_error() === JSON_ERROR_NONE ? $decoded : $body;
        }
        if (str_starts_with($contentType, 'text/')) {
            return self::decodeText($body, $contentType);
        }
        return $body;
    }

    /** The body text for `$response->json`, or null when there is none to give. */
    public static function bodyTextOrNull(string $body, int $statusCode, string $rawContentType): ?string
    {
        if ($statusCode === 204 || $body === '') {
            return null;
        }
        $contentType = strtolower($rawContentType);
        if (self::isJsonMediaType($contentType)) {
            return $body;
        }
        if (str_starts_with($contentType, 'text/')) {
            return self::decodeText($body, $contentType);
        }
        return null;
    }

    /** RFC 6839 structured suffixes included, so `application/problem+json` decodes. */
    private static function isJsonMediaType(string $contentType): bool
    {
        $mediaType = trim(explode(';', $contentType, 2)[0]);
        return $mediaType === 'application/json' || str_ends_with($mediaType, '+json');
    }

    private static function decodeText(string $body, string $contentType): string
    {
        if (str_contains($contentType, 'charset=')) {
            $charset = trim(substr($contentType, strpos($contentType, 'charset=') + 8));
            $charset = trim(explode(';', $charset)[0], " \"'");
            if ($charset !== '' && strcasecmp($charset, 'utf-8') !== 0
                && in_array(strtolower($charset), array_map('strtolower', mb_list_encodings()), true)) {
                $converted = @mb_convert_encoding($body, 'UTF-8', $charset);
                if ($converted !== false) {
                    return $converted;
                }
            }
        }
        if (mb_check_encoding($body, 'UTF-8')) {
            return $body;
        }
        return mb_convert_encoding($body, 'UTF-8', 'ISO-8859-1');
    }

    /** @return array<string,string> */
    private static function flattenHeaders(ResponseInterface $raw): array
    {
        $out = [];
        foreach ($raw->getHeaders() as $name => $values) {
            $out[$name] = implode(', ', $values);
        }
        return $out;
    }

    private static function rewind(?StreamInterface $stream): bool
    {
        if ($stream === null) {
            return true;
        }
        if (!$stream->isSeekable()) {
            return false;
        }
        try {
            $stream->rewind();
            return true;
        } catch (\Throwable) {
            return false;
        }
    }

    private static function sleep(float $seconds): void
    {
        if ($seconds > 0) {
            usleep((int) ($seconds * 1_000_000));
        }
    }

    private static function elapsed(int $startedNs): float
    {
        return round((hrtime(true) - $startedNs) / 1_000_000_000, 4);
    }

    /** @param array<string,mixed>|null $params */
    private static function mergeQuery(
        #[\SensitiveParameter] string $url,
        #[\SensitiveParameter] ?array $params,
    ): string
    {
        // Before the no-parameter return, so a fragment is refused either way: a query appended after one
        // lands inside the fragment, and the call answers 200 unfiltered.
        UrlBuilder::rejectFragment('url', $url);
        if (!$params) {
            return $url;
        }
        $pairs = [];
        foreach ($params as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $item) {
                    $pairs[] = rawurlencode((string) $key) . '=' . rawurlencode(self::scalar($item));
                }
            } else {
                $pairs[] = rawurlencode((string) $key) . '=' . rawurlencode(self::scalar($value));
            }
        }
        if ($pairs === []) {
            return $url;
        }
        return $url . (str_contains($url, '?') ? '&' : '?') . implode('&', $pairs);
    }

    private static function scalar(mixed $value): string
    {
        return is_bool($value) ? ($value ? 'true' : 'false') : (string) $value;
    }

    /** Extension methods pass; {@see RetryPolicy} treats an unfamiliar one as unsafe. */
    private static function normalizeMethod(string $httpMethod): string
    {
        $method = strtoupper(trim($httpMethod));
        if ($method === '') {
            throw new SdkUsageError("http_method: expected a non-blank string like 'GET'");
        }
        if (!RetryPolicy::isMethodToken($method)) {
            throw new SdkUsageError(
                "http_method: '" . self::printableHeaderName($httpMethod) . "' is not a method - "
                . 'RFC 9110 allows only the token character set, so a space, a colon, a control '
                . 'byte and every non-ASCII byte are all outside it'
            );
        }
        return $method;
    }

    /** `/D` because without it `$` also matches before a trailing newline, which is the one
     *  byte that matters most here. */
    private const HEADER_NAME_PATTERN = '/^[!#$%&\'*+\-.^_`|~0-9A-Za-z]+$/D';

    /** Empty, or printable ASCII with space and tab only between two printable characters. */
    private const HEADER_VALUE_PATTERN = '/^$|^[\x21-\x7E]$|^[\x21-\x7E][\x20\x09\x21-\x7E]*[\x21-\x7E]$/D';

    /** Which half of a header this SDK cannot send, or null when both are sendable.
     *  @return 'name'|'value'|null */
    public static function headerProblem(string $name, #[\SensitiveParameter] string $value): ?string
    {
        if (preg_match(self::HEADER_NAME_PATTERN, $name) !== 1) {
            return 'name';
        }
        return preg_match(self::HEADER_VALUE_PATTERN, $value) === 1 ? null : 'value';
    }

    /** A header name as it may appear in a refusal message: every byte outside printable
     *  ASCII becomes `?`, so a raw CR cannot forge a line in the log that receives it. */
    public static function printableHeaderName(string $name): string
    {
        return (string) preg_replace('/[^\x20-\x7E]/', '?', $name);
    }

    /** Refuse a header this SDK cannot send as the caller wrote it.
     *  @param array<string,string>|null $headers */
    public static function refuseUnsendableHeaders(#[\SensitiveParameter] ?array $headers): void
    {
        foreach ($headers ?? [] as $name => $value) {
            $name = (string) $name;
            if (!is_scalar($value)) {
                // Not converted: a value rendered once to be checked and again to be sent is
                // two values, and PSR-7 would refuse it with an exception that is no SdkError.
                throw new SdkUsageError(
                    "header '" . self::printableHeaderName($name) . "': a header value must be text, got "
                    . get_debug_type($value)
                );
            }
            if (self::headerProblem($name, (string) $value) === null) {
                continue;
            }
            throw new SdkUsageError(
                "header '" . self::printableHeaderName($name) . "': not something that can be sent - "
                . 'a name outside the RFC 9110 token set (a colon, a space or a non-ASCII byte), or a '
                . 'value carrying a control byte, a non-ASCII byte, or leading or trailing '
                . 'whitespace. The value is not shown: it may be a credential'
            );
        }
    }
}
