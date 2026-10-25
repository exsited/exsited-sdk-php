<?php

declare(strict_types=1);

namespace Exsited\Sdk\Http;

use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\NetworkExceptionInterface;
use Exsited\Sdk\Config\SdkConfig;
use Exsited\Sdk\Errors\SdkConfigError;

final readonly class RetryPolicy
{
    public const DEFAULT_RETRYABLE_HTTP_CODES = [429, 500, 502, 503, 504];
    /** @var list<int> Empty by default: neither a 429 nor a 503 says the write did not
     *  apply, since a rate limiter can sit behind the handler as easily as in front of it. */
    public const DEFAULT_UNSAFE_RETRYABLE_HTTP_CODES = [];
    /** @var list<string> The RFC 9110 safe methods, and the only list a method can be on to
     *  be treated as freely replayable. */
    public const SAFE_METHODS = ['GET', 'HEAD', 'OPTIONS', 'TRACE'];
    /** @var list<string> Informational only: the status gate narrows a method by its absence
     *  from {@see SAFE_METHODS}, so an unfamiliar method is narrowed too. */
    public const UNSAFE_METHODS = ['POST', 'PUT', 'PATCH', 'DELETE'];
    /** @var list<string> The RFC 9110 idempotent methods - the safe set plus `PUT` and
     *  `DELETE`. `POST` and `PATCH` are deliberately absent, as is every method not named. */
    public const IDEMPOTENT_METHODS = ['GET', 'HEAD', 'OPTIONS', 'TRACE', 'PUT', 'DELETE'];

    /** The lowest and highest values RFC 9110 allows a status code to take. */
    public const MIN_STATUS_CODE = 100;
    public const MAX_STATUS_CODE = 599;

    /** RFC 9110's `method` production is a `token`, so a space, a colon, a control byte and
     *  every non-ASCII byte are outside it. */
    private const METHOD_TOKEN_PATTERN = '/^[!#$%&\'*+\-.^_`|~0-9A-Za-z]+$/D';

    /** @var list<int> */
    public array $retryableStatusCodes;
    /** @var list<int> */
    public array $unsafeRetryableStatusCodes;

    /** @param list<int> $retryableStatusCodes
     *  @param list<int> $unsafeRetryableStatusCodes */
    public function __construct(
        public int $maxAttempts = 1,
        public float $backoffSeconds = 0.5,
        public float $backoffMaxSeconds = 20.0,
        array $retryableStatusCodes = self::DEFAULT_RETRYABLE_HTTP_CODES,
        array $unsafeRetryableStatusCodes = self::DEFAULT_UNSAFE_RETRYABLE_HTTP_CODES,
    ) {
        // Validated here as well as in SdkConfig: this constructor is public, so a policy
        // built through it reaches the transport without passing a config.
        $this->retryableStatusCodes = self::validatedStatusCodes($retryableStatusCodes, 'retryable_status_codes');
        $this->unsafeRetryableStatusCodes = self::validatedStatusCodes(
            $unsafeRetryableStatusCodes,
            'unsafe_retryable_status_codes'
        );
        if ($this->maxAttempts < 1) {
            throw new SdkConfigError(
                "max_attempts: must be at least 1 (1 disables retry), got {$this->maxAttempts}"
            );
        }
        if (!is_finite($this->backoffSeconds) || $this->backoffSeconds < 0) {
            throw new SdkConfigError("backoff_seconds: must be a finite number >= 0, got {$this->backoffSeconds}");
        }
        if (!is_finite($this->backoffMaxSeconds) || $this->backoffMaxSeconds < $this->backoffSeconds) {
            throw new SdkConfigError('backoff_max_seconds: must be a finite number >= backoff_seconds');
        }
    }

    /** A status-code list rebuilt one scalar at a time: `readonly` plus copy-on-write does not detach
     *  a caller's reference slot, so a scalar could otherwise move after validation.
     *  @param array<int|string,mixed> $codes
     *  @return list<mixed> */
    public static function detachStatusCodes(array $codes): array
    {
        $detached = [];
        foreach ($codes as $code) {
            $detached[] = $code;
        }
        return $detached;
    }

    /** `true` is not `1` and `'500'` is not `500`, but PHP's juggling makes each look close
     *  enough to match, or to never match, silently.
     *  @param array<int|string,mixed> $codes
     *  @return list<int> */
    private static function validatedStatusCodes(array $codes, string $field): array
    {
        $validated = [];
        foreach (self::detachStatusCodes($codes) as $code) {
            if (!is_int($code)) {
                throw new SdkConfigError(
                    "{$field}: expected HTTP status codes as integers, got " . get_debug_type($code)
                );
            }
            if ($code < self::MIN_STATUS_CODE || $code > self::MAX_STATUS_CODE) {
                throw new SdkConfigError(
                    "{$field}: {$code} is not an HTTP status code - RFC 9110 allows "
                    . self::MIN_STATUS_CODE . ' through ' . self::MAX_STATUS_CODE
                );
            }
            $validated[] = $code;
        }
        return $validated;
    }

    public static function isMethodToken(string $method): bool
    {
        return preg_match(self::METHOD_TOKEN_PATTERN, $method) === 1;
    }

    public static function fromConfig(SdkConfig $config): self
    {
        return new self(
            maxAttempts: $config->maxRetries,
            backoffSeconds: $config->retryBackoffSeconds,
            backoffMaxSeconds: $config->retryBackoffMaxSeconds,
            retryableStatusCodes: $config->retryableHttpCodes,
            unsafeRetryableStatusCodes: $config->unsafeRetryableHttpCodes,
        );
    }

    /** A safe method needs the status on `retryableStatusCodes`; any other, `POST` and `PATCH` included,
     *  also needs it on `unsafeRetryableStatusCodes`: only the operator can call a duplicate harmless. */
    public function shouldRetryStatusCode(int $statusCode, string $method = 'GET'): bool
    {
        if (!in_array($statusCode, $this->retryableStatusCodes, true)) {
            return false;
        }
        if (self::isSafeMethod($method)) {
            return true;
        }
        return in_array($statusCode, $this->unsafeRetryableStatusCodes, true);
    }

    /** Any method for a connection never established, the idempotent set for a failure after
     *  the request went out, nothing otherwise. Unproven is not undelivered. */
    public function shouldRetryAfterException(\Throwable $exception, string $method = 'GET'): bool
    {
        if (self::connectionWasNeverEstablished($exception)) {
            return true;
        }
        return self::isIdempotentMethod($method) && self::isTransportFailure($exception);
    }

    /** The headers arrived, so the request was fully sent and the API may have applied the write;
     *  nothing raised at this point changes that, so the failure itself is not consulted. */
    public function shouldRetryAfterResponseBodyFailure(string $method): bool
    {
        return self::isIdempotentMethod($method);
    }

    /** Decided on curl's `connect_time`, 0 until TCP is up, not the class: Guzzle reports a read timeout
     *  as a `ConnectException` too. A transport with no such context falls to the idempotent gate. */
    private static function connectionWasNeverEstablished(\Throwable $exception): bool
    {
        if (self::isTlsHandshake($exception)) {
            return true;
        }
        if (!$exception instanceof ConnectException) {
            return false;
        }
        $context = $exception->getHandlerContext();
        if (!array_key_exists('connect_time', $context)) {
            return false;
        }
        return (float) $context['connect_time'] === 0.0
            && (float) ($context['size_upload'] ?? 0) === 0.0;
    }

    /** A malformed URL or an unsupported protocol fails identically on every attempt, so
     *  neither is retried for any method. */
    private static function isTransportFailure(\Throwable $exception): bool
    {
        return $exception instanceof ConnectException
            || $exception instanceof NetworkExceptionInterface
            || self::isTimeout($exception);
    }

    /** `2 ** 1024` is `INF` and `0.0 * INF` is `NaN`, so the exponent is clamped; `2 ** 62` is far past
     *  any `backoffMaxSeconds`, so the clamp cannot shorten a real wait. */
    private const MAX_BACKOFF_EXPONENT = 62;

    /** Exponential backoff with full jitter. */
    public function computeBackoffSeconds(int $attempt, ?string $retryAfter = null): float
    {
        $serverDelay = self::parseRetryAfter($retryAfter);
        if ($serverDelay !== null) {
            return min($serverDelay, $this->backoffMaxSeconds);
        }
        $exponent = min(max(0, $attempt - 1), self::MAX_BACKOFF_EXPONENT);
        $window = min($this->backoffSeconds * (2 ** $exponent), $this->backoffMaxSeconds);
        return (mt_rand() / mt_getrandmax()) * $window;
    }

    /** One number covers all three deadlines - connect, whole-transfer and idle read are
     *  each `CURLE_OPERATION_TIMEDOUT`, and curl raises nothing else for any of them. */
    private const TIMEOUT_CURL_ERRNO = 28;

    /** Tells `ErrorType::Timeout` from `ErrorType::Network` by curl's error number, never the message:
     *  Guzzle puts the request URI in it, so `searchText=timeout` would match; no number means Network. */
    public static function isTimeout(\Throwable $exception): bool
    {
        return self::curlErrno($exception) === self::TIMEOUT_CURL_ERRNO;
    }

    /** Both Guzzle exception classes, because Guzzle picks between them by error number and
     *  the numbers this class reads fall on both sides of that split. */
    private static function curlErrno(\Throwable $exception): ?int
    {
        if (!$exception instanceof RequestException && !$exception instanceof ConnectException) {
            return null;
        }
        $errno = $exception->getHandlerContext()['errno'] ?? null;
        return is_numeric($errno) ? (int) $errno : null;
    }

    /** curl's TLS/certificate error numbers, every one raised while the handshake is being
     *  negotiated - before a byte of the request is written. */
    private const TLS_CURL_ERRNOS = [35, 51, 53, 54, 58, 59, 60, 64, 66, 77, 80, 82, 83, 90, 91];

    private static function isTlsHandshake(\Throwable $exception): bool
    {
        // The error number first: matching "ssl" against the message would misread a
        // connection failure to a host such as ssl.example.com as a handshake failure.
        $errno = self::curlErrno($exception);
        if ($errno !== null) {
            return in_array($errno, self::TLS_CURL_ERRNOS, true);
        }
        // No context to judge by: phrases that appear only in a TLS failure, not the bare
        // token "ssl".
        $message = strtolower($exception->getMessage());
        return str_contains($message, 'ssl certificate')
            || str_contains($message, 'certificate verify')
            || str_contains($message, 'certificate problem')
            || str_contains($message, 'ssl connect error')
            || str_contains($message, 'unable to get local issuer');
    }

    /** A method not on the list, and a value that is not a method token at all, is treated
     *  as state-changing - the only answer that cannot duplicate a write. */
    public static function isSafeMethod(string $method): bool
    {
        $normalised = strtoupper(trim($method));
        return in_array($normalised, self::SAFE_METHODS, true);
    }

    /** A method not on the list, and a non-token, is treated as non-idempotent. */
    private static function isIdempotentMethod(string $method): bool
    {
        $normalised = strtoupper(trim($method));
        return in_array($normalised, self::IDEMPOTENT_METHODS, true);
    }

    private static function parseRetryAfter(?string $retryAfter): ?float
    {
        if ($retryAfter === null || trim($retryAfter) === '') {
            return null;
        }
        $value = trim($retryAfter);
        if (is_numeric($value)) {
            return max(0.0, (float) $value);
        }
        $timestamp = strtotime($value);
        if ($timestamp === false) {
            return null;
        }
        return max(0.0, (float) ($timestamp - time()));
    }
}
