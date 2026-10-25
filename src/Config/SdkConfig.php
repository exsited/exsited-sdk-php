<?php

declare(strict_types=1);

namespace Exsited\Sdk\Config;

use Exsited\Sdk\Auth\FileTokenStore;
use Exsited\Sdk\Errors\SdkConfigError;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Http\RetryPolicy;
use Exsited\Sdk\Http\Transport;
use Exsited\Sdk\Redaction;

/** Frozen SDK configuration - every setting the SDK reads. */
final class SdkConfig
{
    public const PRINT_FORMAT_PRETTY = 'pretty';
    public const PRINT_FORMAT_COMPACT = 'compact';

    /** `$response->data` is the decoded body, the built-in default. */
    public const RESPONSE_FORMAT_MAP = 'map';
    /** `$response->data` is the server's own body text. */
    public const RESPONSE_FORMAT_JSON = 'json';
    /** `$response->data` is the typed view of the body. */
    public const RESPONSE_FORMAT_DTO = 'dto';
    /** The one environment variable this SDK reads, and the lowest-priority source. */
    public const RESPONSE_FORMAT_ENV_VAR = 'EXSITED_RESPONSE_FORMAT';
    public const VALID_RESPONSE_FORMATS = [
        self::RESPONSE_FORMAT_MAP,
        self::RESPONSE_FORMAT_JSON,
        self::RESPONSE_FORMAT_DTO,
    ];
    public const DEFAULT_RETRYABLE_HTTP_CODES = RetryPolicy::DEFAULT_RETRYABLE_HTTP_CODES;
    public const DEFAULT_UNSAFE_RETRYABLE_HTTP_CODES = RetryPolicy::DEFAULT_UNSAFE_RETRYABLE_HTTP_CODES;

    public const DEFAULT_API_VERSION = 'v4';
    public const DEFAULT_TIMEOUT_SECONDS = 30.0;
    public const DEFAULT_CONNECT_TIMEOUT_SECONDS = 10.0;
    public const DEFAULT_MAX_RETRIES = 1;
    public const DEFAULT_RETRY_BACKOFF_SECONDS = 0.5;
    public const DEFAULT_RETRY_BACKOFF_MAX_SECONDS = 20.0;
    public const DEFAULT_POOL_MAXSIZE = 10;
    public const DEFAULT_MAX_RESPONSE_BYTES = 64 * 1024 * 1024;
    /** Finished request body ceiling, in bytes: 64 MiB - the wire total, data plus framing. */
    public const DEFAULT_MAX_REQUEST_BYTES = 64 * 1024 * 1024;
    /** Caller payload into one body, in bytes: 64 MiB. Counted before framing, all sources at once. */
    public const DEFAULT_MAX_REQUEST_SOURCE_BYTES = 64 * 1024 * 1024;
    /** Multipart framing per body, in bytes: 1 MiB - delimiters, CRLFs, part headers, not data. */
    public const DEFAULT_MAX_MULTIPART_OVERHEAD_BYTES = 1024 * 1024;
    /** Spool copy ceiling, in bytes: 64 MiB. Applied per part as it is read. */
    public const DEFAULT_MAX_SPOOL_BYTES = 64 * 1024 * 1024;
    /** Token cache file ceiling, in bytes: 1 MiB. FileTokenStore reads its own
     *  FileTokenStore::MAX_TOKEN_CACHE_BYTES, so any other value is refused rather than ignored. */
    public const DEFAULT_MAX_TOKEN_CACHE_BYTES = 1024 * 1024;
    public const DEFAULT_MAX_CA_BUNDLE_BYTES = 8 * 1024 * 1024;
    public const DEFAULT_LOG_LEVEL = 'WARNING';
    public const DEFAULT_PRINT_FORMAT = self::PRINT_FORMAT_PRETTY;
    public const DEFAULT_RESPONSE_FORMAT = self::RESPONSE_FORMAT_MAP;

    private const VALID_LOG_LEVELS = ['DEBUG', 'INFO', 'WARNING', 'ERROR', 'CRITICAL'];
    private const MAX_HTTP_CODES = 500;

    public readonly string $apiVersion;
    public readonly string $logLevel;
    public readonly string $printFormat;
    public readonly string $responseFormat;
    public readonly string $userAgent;
    /** @var array<string,string> */
    public readonly array $defaultHeaders;
    /** @var list<int> */
    public readonly array $retryableHttpCodes;
    /** @var list<int> */
    public readonly array $unsafeRetryableHttpCodes;

    /** @param list<int> $retryableHttpCodes
     *  @param list<int> $unsafeRetryableHttpCodes
     *  @param array<string,string>|list<array{string,string}>|string $defaultHeaders
     *  @param string|null $responseFormat `"map"`, `"json"` or `"dto"`; null resolves code
     *      first - the call's parameter, else this, else `EXSITED_RESPONSE_FORMAT`, else `"map"`. */
    public function __construct(
        public readonly AuthConfig $auth,
        string $apiVersion = self::DEFAULT_API_VERSION,
        public readonly float $timeoutSeconds = self::DEFAULT_TIMEOUT_SECONDS,
        public readonly float $connectTimeoutSeconds = self::DEFAULT_CONNECT_TIMEOUT_SECONDS,
        public readonly int $maxRetries = self::DEFAULT_MAX_RETRIES,
        array $retryableHttpCodes = self::DEFAULT_RETRYABLE_HTTP_CODES,
        array $unsafeRetryableHttpCodes = self::DEFAULT_UNSAFE_RETRYABLE_HTTP_CODES,
        public readonly float $retryBackoffSeconds = self::DEFAULT_RETRY_BACKOFF_SECONDS,
        public readonly float $retryBackoffMaxSeconds = self::DEFAULT_RETRY_BACKOFF_MAX_SECONDS,
        public readonly bool $verifySsl = true,
        public readonly ?string $caBundle = null,
        public readonly ?string $proxyUrl = null,
        public readonly int $poolMaxsize = self::DEFAULT_POOL_MAXSIZE,
        public readonly int $maxResponseBytes = self::DEFAULT_MAX_RESPONSE_BYTES,
        array|string $defaultHeaders = [],
        public readonly bool $raiseOnError = false,
        ?string $userAgent = null,
        string $logLevel = self::DEFAULT_LOG_LEVEL,
        public readonly bool $logBodies = false,
        public readonly ?string $logFile = null,
        public readonly bool $printApiInfo = false,
        public readonly bool $printRequestPayload = false,
        public readonly bool $printResponseBody = false,
        public readonly bool $printHeaders = false,
        public readonly bool $printCurl = false,
        public readonly bool $printOnlyOnError = false,
        string $printFormat = self::DEFAULT_PRINT_FORMAT,
        public readonly bool $printColor = false,
        public readonly int $printMaxChars = 0,
        ?string $responseFormat = null,
        public readonly int $maxRequestBytes = self::DEFAULT_MAX_REQUEST_BYTES,
        public readonly int $maxRequestSourceBytes = self::DEFAULT_MAX_REQUEST_SOURCE_BYTES,
        public readonly int $maxMultipartOverheadBytes = self::DEFAULT_MAX_MULTIPART_OVERHEAD_BYTES,
        public readonly int $maxSpoolBytes = self::DEFAULT_MAX_SPOOL_BYTES,
        public readonly int $maxTokenCacheBytes = self::DEFAULT_MAX_TOKEN_CACHE_BYTES,
        public readonly int $maxCaBundleBytes = self::DEFAULT_MAX_CA_BUNDLE_BYTES,
    ) {
        $normalisedVersion = strtolower(trim($apiVersion));
        if ($normalisedVersion !== '' && !str_starts_with($normalisedVersion, 'v')) {
            $normalisedVersion = 'v' . $normalisedVersion;
        }
        $this->apiVersion = $normalisedVersion;
        // Detached first: a reference in the caller's array must not change classification.
        $this->retryableHttpCodes = RetryPolicy::detachStatusCodes($retryableHttpCodes);
        $this->unsafeRetryableHttpCodes = RetryPolicy::detachStatusCodes($unsafeRetryableHttpCodes);
        $this->logLevel = strtoupper(trim($logLevel));
        $this->printFormat = strtolower(trim($printFormat));
        $this->responseFormat = self::resolveResponseFormat($responseFormat);
        $this->userAgent = $userAgent ?? self::defaultUserAgent();

        $headerProblem = null;
        try {
            $this->defaultHeaders = self::normaliseHeaders($defaultHeaders);
        } catch (SdkConfigError $error) {
            $this->defaultHeaders = [];
            $headerProblem = $error->getMessage();
        }

        $this->validate($headerProblem, $responseFormat === null ? self::RESPONSE_FORMAT_ENV_VAR : null);
    }

    /** A blank `EXSITED_RESPONSE_FORMAT` counts as unset, not as an invalid value. */
    private static function resolveResponseFormat(?string $chosen): string
    {
        if ($chosen !== null) {
            return strtolower(trim($chosen));
        }
        $fromEnvironment = getenv(self::RESPONSE_FORMAT_ENV_VAR);
        if (is_string($fromEnvironment) && trim($fromEnvironment) !== '') {
            return strtolower(trim($fromEnvironment));
        }
        return self::DEFAULT_RESPONSE_FORMAT;
    }

    private function validate(?string $headerProblem, ?string $responseFormatSource = null): void
    {
        $problems = [];
        // A configured path travels on getErrorMessages(), never in the printed message.
        $withheld = [];
        if ($headerProblem !== null) {
            $problems[] = $headerProblem;
        }

        if (!preg_match('/^v?[1-9][0-9]*$/i', $this->apiVersion)) {
            $problems[] = "api_version: expected something like 'v4' or '4', got '{$this->apiVersion}'";
        }
        if (!is_finite($this->timeoutSeconds) || $this->timeoutSeconds <= 0) {
            $problems[] = 'timeout_seconds: must be > 0';
        }
        if (!is_finite($this->connectTimeoutSeconds) || $this->connectTimeoutSeconds <= 0) {
            $problems[] = 'connect_timeout_seconds: must be > 0';
        }
        if ($this->maxRetries < 1) {
            $problems[] = "max_retries: must be at least 1 (1 disables retry), got {$this->maxRetries}";
        }
        if (!is_finite($this->retryBackoffSeconds) || $this->retryBackoffSeconds < 0) {
            $problems[] = 'retry_backoff_seconds: must be >= 0';
        }
        if (!is_finite($this->retryBackoffMaxSeconds) || $this->retryBackoffMaxSeconds < $this->retryBackoffSeconds) {
            $problems[] = 'retry_backoff_max_seconds: must be >= retry_backoff_seconds';
        }
        if ($this->poolMaxsize < 1) {
            $problems[] = 'pool_maxsize: must be at least 1';
        }
        foreach ([
            'max_response_bytes' => $this->maxResponseBytes,
            'max_request_bytes' => $this->maxRequestBytes,
            'max_request_source_bytes' => $this->maxRequestSourceBytes,
            'max_multipart_overhead_bytes' => $this->maxMultipartOverheadBytes,
            'max_spool_bytes' => $this->maxSpoolBytes,
            'max_token_cache_bytes' => $this->maxTokenCacheBytes,
            'max_ca_bundle_bytes' => $this->maxCaBundleBytes,
        ] as $name => $ceiling) {
            if ($ceiling < 1) {
                $problems[] = "{$name}: must be at least 1 byte, got {$ceiling}";
            }
        }
        if ($this->maxTokenCacheBytes >= 1 && $this->maxTokenCacheBytes !== FileTokenStore::MAX_TOKEN_CACHE_BYTES) {
            $problems[] = 'max_token_cache_bytes: not configurable in this SDK yet; the file token store '
                . 'reads a fixed ' . FileTokenStore::MAX_TOKEN_CACHE_BYTES . "-byte ceiling, got {$this->maxTokenCacheBytes}";
        }
        foreach (['retryable_http_codes' => $this->retryableHttpCodes, 'unsafe_retryable_http_codes' => $this->unsafeRetryableHttpCodes] as $name => $codes) {
            if (count($codes) > self::MAX_HTTP_CODES) {
                $problems[] = "{$name}: at most " . self::MAX_HTTP_CODES . ' status codes';
                continue;
            }
            foreach ($codes as $code) {
                if (!is_int($code) || $code < 100 || $code > 599) {
                    $problems[] = "{$name}: {$code} is not an HTTP status code";
                }
            }
        }
        if (!in_array($this->logLevel, self::VALID_LOG_LEVELS, true)) {
            $problems[] = 'log_level: expected one of ' . implode(', ', self::VALID_LOG_LEVELS) . ", got '{$this->logLevel}'";
        }
        if (!in_array($this->printFormat, [self::PRINT_FORMAT_PRETTY, self::PRINT_FORMAT_COMPACT], true)) {
            $problems[] = "print_format: expected one of pretty, compact, got '{$this->printFormat}'";
        }
        if (!in_array($this->responseFormat, self::VALID_RESPONSE_FORMATS, true)) {
            $problems[] = 'response_format: expected one of ' . implode(', ', self::VALID_RESPONSE_FORMATS)
                . ", got '{$this->responseFormat}'"
                . ($responseFormatSource !== null ? " (read from {$responseFormatSource})" : '');
        }
        if ($this->printMaxChars < 0) {
            $problems[] = 'print_max_chars: must be >= 0 (0 = unlimited)';
        }
        if ($this->caBundle !== null && $this->caBundle !== '') {
            if (!$this->verifySsl) {
                $problems[] = 'ca_bundle and verify_ssl=false are contradictory: one supplies a trust '
                    . 'store, the other disables verification';
            }
            $withheld[] = 'ca_bundle: ' . $this->caBundle;
            if (!is_file($this->caBundle)) {
                $problems[] = 'ca_bundle: no such file (the configured path is on getErrorMessages())';
            } else {
                // Sized before a client is built: GuzzleClientFactory hands it to curl.
                $size = @filesize($this->caBundle);
                if (is_int($size) && $size > $this->maxCaBundleBytes) {
                    $problems[] = "ca_bundle: the configured file is {$size} bytes, over the "
                        . "{$this->maxCaBundleBytes}-byte max_ca_bundle_bytes ceiling; point at a "
                        . 'trust store, or raise max_ca_bundle_bytes (the path is on '
                        . 'getErrorMessages())';
                }
            }
        }

        if ($problems !== []) {
            throw new SdkConfigError(implode('; ', $problems), errors: $withheld);
        }
    }

    public function baseUrl(): string
    {
        return $this->auth->baseUrl;
    }

    public function clientId(): string
    {
        return $this->auth->clientId;
    }

    public function clientSecret(): string
    {
        return $this->auth->clientSecret;
    }

    public function redirectUri(): string
    {
        return $this->auth->redirectUri;
    }

    public function clientName(): string
    {
        return $this->auth->clientName;
    }

    public function grantType(): string
    {
        return $this->auth->grantType;
    }

    public function tokenCachePath(): ?string
    {
        return $this->auth->tokenCachePath;
    }

    /** The two timeouts, connect first. `timeoutSeconds` bounds one whole attempt, connect phase
     *  included, as curl's `CURLOPT_TIMEOUT`; each retry gets a fresh ceiling.
     *  @return array{float,float} connect then read timeouts */
    public function timeout(): array
    {
        return [$this->connectTimeoutSeconds, $this->timeoutSeconds];
    }

    /** @return array<string,string> */
    public function defaultHeadersDict(): array
    {
        return $this->defaultHeaders;
    }

    /** @param array<int|string,mixed> $credentials @param array<string,mixed> $overrides */
    public static function fromCredentials(array $credentials, int|string|null $instance = null, array $overrides = []): self
    {
        $chosen = self::selectCredentials($credentials, $instance);
        if ($chosen instanceof self) {
            return $overrides !== [] ? $chosen->withOverrides($overrides) : $chosen;
        }
        if ($chosen instanceof AuthConfig) {
            self::rejectUnknownConfigFields($overrides);
            return new self($chosen, ...$overrides);
        }
        if (!is_array($chosen)) {
            throw new SdkConfigError('credentials: expected an SdkConfig, an AuthConfig or a mapping of config fields, got ' . get_debug_type($chosen));
        }
        $block = $chosen;
        $suppliedAuth = $block['auth'] ?? null;
        unset($block['auth']);
        $authNames = ['baseUrl', 'clientId', 'clientSecret', 'redirectUri', 'clientName', 'grantType', 'tokenCachePath'];
        $authValues = [];
        foreach ($authNames as $name) {
            if (array_key_exists($name, $block)) {
                $authValues[$name] = $block[$name];
                unset($block[$name]);
            }
        }
        $settings = array_merge($block, $overrides);
        self::rejectUnknownConfigFields($settings);
        if ($suppliedAuth === null) {
            // Else a short mapping raises ArgumentCountError naming a positional parameter. The
            // AuthConfig fields with a default (grantType, tokenCachePath) are not demanded.
            $missing = array_diff(
                ['baseUrl', 'clientId', 'clientSecret', 'redirectUri', 'clientName'],
                array_keys($authValues),
            );
            if ($missing !== []) {
                throw new SdkConfigError('credentials: missing required field(s): ' . implode(', ', $missing));
            }
            return new self(new AuthConfig(...$authValues), ...$settings);
        }
        if ($authValues !== []) {
            throw new SdkConfigError('auth: an AuthConfig was supplied alongside credential field(s) '
                . implode(', ', array_keys($authValues)) . '; pass one or the other');
        }
        return new self($suppliedAuth, ...$settings);
    }

    /** @param array<int|string,mixed> $credentials */
    public static function selectCredentials(array $credentials, int|string|null $instance = null): mixed
    {
        $blocks = array_values($credentials);
        if ($blocks === []) {
            throw new SdkUsageError('no credentials were supplied');
        }
        if ($instance === null) {
            return $blocks[0];
        }
        if (is_int($instance)) {
            if (!array_key_exists($instance, $blocks)) {
                $count = count($blocks);
                throw new SdkUsageError("no credentials at index {$instance}; {$count} supplied (0-" . ($count - 1) . ')');
            }
            return $blocks[$instance];
        }
        $matched = [];
        foreach ($blocks as $index => $block) {
            if (self::readClientName($block) === $instance) {
                $matched[] = $index;
            }
        }
        if (count($matched) > 1) {
            throw new SdkUsageError("instance '{$instance}' is defined more than once, at index "
                . implode(' and ', $matched) . '; client_name has to identify one entry');
        }
        if ($matched !== []) {
            return $blocks[$matched[0]];
        }
        $available = [];
        foreach ($blocks as $index => $block) {
            $available[] = self::readClientName($block) ?? "<index {$index}>";
        }
        throw new SdkUsageError("unknown instance '{$instance}'; available: " . implode(', ', $available));
    }

    public static function readClientName(mixed $block): ?string
    {
        if ($block instanceof self || $block instanceof AuthConfig) {
            return $block instanceof self ? $block->clientName() : $block->clientName;
        }
        if (is_array($block)) {
            $value = $block['clientName'] ?? $block['client_name'] ?? null;
            return $value !== null && $value !== '' ? (string) $value : null;
        }
        return null;
    }

    /** @param array<string,mixed> $changes */
    public function withOverrides(array $changes): self
    {
        self::rejectUnknownConfigFields($changes);
        $current = [
            'apiVersion' => $this->apiVersion,
            'timeoutSeconds' => $this->timeoutSeconds,
            'connectTimeoutSeconds' => $this->connectTimeoutSeconds,
            'maxRetries' => $this->maxRetries,
            'retryableHttpCodes' => $this->retryableHttpCodes,
            'unsafeRetryableHttpCodes' => $this->unsafeRetryableHttpCodes,
            'retryBackoffSeconds' => $this->retryBackoffSeconds,
            'retryBackoffMaxSeconds' => $this->retryBackoffMaxSeconds,
            'verifySsl' => $this->verifySsl,
            'caBundle' => $this->caBundle,
            'proxyUrl' => $this->proxyUrl,
            'poolMaxsize' => $this->poolMaxsize,
            'maxResponseBytes' => $this->maxResponseBytes,
            'maxRequestBytes' => $this->maxRequestBytes,
            'maxRequestSourceBytes' => $this->maxRequestSourceBytes,
            'maxMultipartOverheadBytes' => $this->maxMultipartOverheadBytes,
            'maxSpoolBytes' => $this->maxSpoolBytes,
            'maxTokenCacheBytes' => $this->maxTokenCacheBytes,
            'maxCaBundleBytes' => $this->maxCaBundleBytes,
            'defaultHeaders' => $this->defaultHeaders,
            'raiseOnError' => $this->raiseOnError,
            'userAgent' => $this->userAgent,
            'logLevel' => $this->logLevel,
            'logBodies' => $this->logBodies,
            'logFile' => $this->logFile,
            'printApiInfo' => $this->printApiInfo,
            'printRequestPayload' => $this->printRequestPayload,
            'printResponseBody' => $this->printResponseBody,
            'printHeaders' => $this->printHeaders,
            'printCurl' => $this->printCurl,
            'printOnlyOnError' => $this->printOnlyOnError,
            'printFormat' => $this->printFormat,
            'printColor' => $this->printColor,
            'printMaxChars' => $this->printMaxChars,
            // The resolved value: an override must not re-read the environment.
            'responseFormat' => $this->responseFormat,
        ];
        $merged = array_merge($current, $changes);
        return new self($this->auth, ...$merged);
    }

    /** `exsited-php-sdk/<version>`; a method, not a const, as the version is read at runtime. */
    public static function defaultUserAgent(): string
    {
        return 'exsited-php-sdk/' . self::sdkVersion();
    }

    public static function sdkVersion(): string
    {
        if (class_exists(\Composer\InstalledVersions::class)) {
            try {
                $version = \Composer\InstalledVersions::getPrettyVersion('exsited/exsited');
                if ($version !== null && $version !== '') {
                    return $version;
                }
            } catch (\Throwable) {
                // fall through
            }
        }
        return '0.0.0+source';
    }

    public function __toString(): string
    {
        $shown = Redaction::redactFields($this, ['auth', 'apiVersion', 'maxRetries', 'raiseOnError', 'logLevel']);
        return 'SdkConfig(' . implode(', ', $shown) . ')';
    }

    /** @param array<string,mixed> $values */
    private static function rejectUnknownConfigFields(array $values): void
    {
        $known = [
            'apiVersion', 'timeoutSeconds', 'connectTimeoutSeconds', 'maxRetries', 'retryableHttpCodes',
            'unsafeRetryableHttpCodes', 'retryBackoffSeconds', 'retryBackoffMaxSeconds', 'verifySsl',
            'caBundle', 'proxyUrl', 'poolMaxsize', 'maxResponseBytes', 'maxRequestBytes',
            'maxRequestSourceBytes', 'maxMultipartOverheadBytes', 'maxSpoolBytes',
            'maxTokenCacheBytes', 'maxCaBundleBytes', 'defaultHeaders',
            'raiseOnError', 'userAgent',
            'logLevel', 'logBodies', 'logFile', 'printApiInfo', 'printRequestPayload', 'printResponseBody',
            'printHeaders', 'printCurl', 'printOnlyOnError', 'printFormat', 'printColor', 'printMaxChars',
            'responseFormat',
        ];
        $unknown = array_diff(array_keys($values), $known);
        if ($unknown !== []) {
            throw new SdkConfigError('unknown config field(s): ' . implode(', ', $unknown));
        }
    }

    /** @param array<string,string>|list<array{string,string}>|string $raw
     *  @return array<string,string> */
    private static function normaliseHeaders(array|string $raw): array
    {
        if ($raw === [] || $raw === '') {
            return [];
        }
        if (is_string($raw)) {
            $decoded = json_decode($raw, true);
            if (!is_array($decoded)) {
                throw new SdkConfigError('default_headers: expected a mapping or a JSON object');
            }
            $raw = $decoded;
        }
        $pairs = [];
        if (array_is_list($raw)) {
            foreach ($raw as $entry) {
                if (!is_array($entry) || count($entry) !== 2) {
                    throw new SdkConfigError('default_headers: expected (name, value) pairs');
                }
                $entry = array_values($entry);
                $pairs[(string) $entry[0]] = self::headerValue($entry[1]);
            }
        } else {
            foreach ($raw as $name => $value) {
                $pairs[(string) $name] = self::headerValue($value);
            }
        }
        foreach ($pairs as $name => $value) {
            self::validateHeader((string) $name, $value);
        }
        return $pairs;
    }

    private static function headerValue(mixed $value): string
    {
        if (!is_scalar($value)) {
            throw new SdkConfigError('default_headers: a value is not a header value; headers must be flat');
        }
        return is_bool($value) ? ($value ? '1' : '') : (string) $value;
    }

    /** Delegates to {@see Transport::headerProblem()} so config and transport judge by one
     *  grammar. The name is made printable first, so a CR in it cannot forge a log line. */
    private static function validateHeader(string $name, string $value): void
    {
        $problem = Transport::headerProblem($name, $value);
        if ($problem === null) {
            return;
        }
        $named = Transport::printableHeaderName($name);
        if ($problem === 'name') {
            throw new SdkConfigError(
                "default_headers: '{$named}' is not a sendable header name - the RFC 9110 token set "
                . 'excludes a colon, a space and every non-ASCII byte'
            );
        }
        throw new SdkConfigError(
            "default_headers: the value for '{$named}' is not sendable - a control byte, a "
            . 'non-ASCII byte, or leading or trailing whitespace. The value is not shown: it may '
            . 'be a credential'
        );
    }

    /** The redacted `__toString()` view; without it `var_dump` prints every credential.
     *  @return array<string,string> */
    public function __debugInfo(): array
    {
        return ['redacted' => (string) $this];
    }
}
