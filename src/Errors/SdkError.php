<?php

declare(strict_types=1);

namespace Exsited\Sdk\Errors;

use Exsited\Sdk\Client\ErrorType;

/** Base class for every error the SDK raises, and raised directly for any non-2xx response that is
 *  not an auth or usage problem. */
class SdkError extends \RuntimeException
{
    /** @var list<string> */
    public array $errors;

    /** @param array<string,string> $responseHeaders already redacted by the caller
     *  @param list<string> $errors
     *  @param \Throwable|null $previous kept on the chain; the original type and trace survive */
    public function __construct(
        string $message,
        public readonly ?int $statusCode = null,
        public readonly ?ErrorType $errorType = null,
        public readonly mixed $rawResponse = null,
        public readonly array $responseHeaders = [],
        public readonly mixed $requestInfo = null,
        array $errors = [],
        ?\Throwable $previous = null,
    ) {
        parent::__construct($message, 0, $previous);
        $this->errors = array_values($errors);
    }

    public function addError(string $errorMessage): static
    {
        $this->errors[] = $errorMessage;
        return $this;
    }

    /** @return list<string> */
    public function getErrorMessages(): array
    {
        return $this->errors;
    }

    public function getHint(): ?string
    {
        if ($this->statusCode === null) {
            return null;
        }
        return self::HINTS_BY_STATUS[$this->statusCode] ?? null;
    }

    /** The diagnostic block: safe to log by default. */
    public function explain(bool $includeSensitiveDetail = false): string
    {
        $lines = [(string) $this];

        $info = $this->requestInfo;
        if (is_object($info)) {
            $elapsed = $info->elapsedSeconds ?? null;
            if ($elapsed !== null) {
                $lines[] = "  elapsed : {$elapsed}s";
            }
        }

        $lines[] = '  reported: ' . count($this->getErrorMessages()) . ' message(s)';
        $lines[] = '  body    : ' . self::describeBody($this->rawResponse);

        $hint = $this->getHint();
        if ($hint !== null) {
            $lines[] = '  hint    : ' . $hint;
        }

        if (!$includeSensitiveDetail) {
            $lines[] = '  detail  : withheld - call explain(true) for query values, the '
                . 'reported messages and the body';
            return implode("\n", $lines);
        }

        if (is_object($info)) {
            $params = $info->queryParams ?? null;
            if (is_array($params) && $params !== []) {
                $lines[] = '  params  : ' . self::flatten($params);
            }
            $url = $info->url ?? null;
            if (is_string($url) && $url !== '') {
                $lines[] = '  url     : ' . self::flatten($url);
            }
        }

        $location = self::redirectTarget($this->responseHeaders);
        if ($location !== null && $location !== '') {
            $lines[] = '  location: ' . self::flatten($location);
        }

        $messages = $this->getErrorMessages();
        if ($messages !== []) {
            $lines[] = '  messages:';
            foreach ($messages as $message) {
                $lines[] = '    - ' . self::flatten($message);
            }
        }

        if ($this->rawResponse !== null) {
            $body = self::flatten($this->rawResponse);
            if (strlen($body) > 500) {
                $body = substr($body, 0, 500) . '... +' . (strlen($body) - 500) . ' chars';
            }
            $lines[] = '  content : ' . $body;
        }

        return implode("\n", $lines);
    }

    /** One structural line, and the default output of every failure. */
    public function __toString(): string
    {
        $parts = [self::shortClassName(static::class)];
        if ($this->statusCode) {
            $parts[] = '[' . $this->statusCode . ']';
        }
        if ($this->errorType !== null) {
            $parts[] = $this->errorType->value;
        }
        $info = $this->requestInfo;
        if (is_object($info)) {
            $method = $info->httpMethod ?? null;
            if ($method) {
                $parts[] = self::flatten((string) $method);
            }
            $template = $info->endpointTemplate ?? null;
            $parts[] = is_string($template) && $template !== ''
                ? self::flatten($template)
                : '(endpoint not declared)';
            $attempts = $info->attemptCount ?? null;
            $maxAttempts = $info->maxAttempts ?? null;
            if ($attempts && $maxAttempts) {
                $parts[] = "attempt {$attempts}/{$maxAttempts}";
            }
        }
        return implode(' ', $parts) . ' - ' . self::flatten($this->getMessage());
    }

    /** What came back, as a shape: a type, and a size or key names - never a value. */
    private static function describeBody(mixed $body): string
    {
        if ($body === null) {
            return 'none';
        }
        if (is_array($body)) {
            $names = [];
            foreach (array_keys($body) as $position => $key) {
                if (count($names) === 12) {
                    $names[] = '+' . (count($body) - 12) . ' more';
                    break;
                }
                $text = (string) $key;
                $names[] = preg_match('/^[A-Za-z0-9_.-]{1,40}$/', $text) === 1 ? $text : "#{$position}";
            }
            return count($body) . ' key(s) [' . implode(',', $names) . ']';
        }
        if (is_string($body)) {
            return strlen($body) . ' byte(s) of ' . get_debug_type($body);
        }
        return get_debug_type($body);
    }

    private static function shortClassName(string $class): string
    {
        $separator = strrpos($class, '\\');
        return $separator === false ? $class : substr($class, $separator + 1);
    }

    private static function flatten(mixed $value): string
    {
        $text = self::safeStr($value);
        return preg_replace_callback(
            '/[\x{0}-\x{1f}\x{7f}-\x{9f}\x{2028}\x{2029}]/u',
            static function (array $match): string {
                $cp = mb_ord($match[0], 'UTF-8');
                return $cp !== false && $cp <= 0xff ? sprintf('\\x%02x', $cp) : sprintf('\\u%04x', (int) $cp);
            },
            $text
        ) ?? $text;
    }

    private static function safeStr(mixed $value): string
    {
        if (is_string($value)) {
            return $value;
        }
        if ($value === null) {
            return 'null';
        }
        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }
        if (is_scalar($value)) {
            return (string) $value;
        }
        $encoded = json_encode($value, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        if ($encoded !== false) {
            return $encoded;
        }
        return '<' . get_debug_type($value) . '>';
    }

    /** @param array<string,string> $headers */
    private static function redirectTarget(array $headers): ?string
    {
        foreach ($headers as $name => $value) {
            if (strtolower((string) $name) === 'location') {
                return $value;
            }
        }
        return null;
    }

    private const REDIRECT_HINT =
        'the application redirected and the SDK does not follow one - read the Location '
        . 'header off the response and decide whether to re-issue the call against it. '
        . 'The copy on this exception\'s response_headers has its secret query '
        . 'parameters redacted, so it is for reading and not for re-issuing: call again '
        . 'with raise_on_error off if you need the response itself';

    private const HINTS_BY_STATUS = [
        301 => self::REDIRECT_HINT,
        302 => self::REDIRECT_HINT,
        303 => self::REDIRECT_HINT,
        307 => self::REDIRECT_HINT,
        308 => self::REDIRECT_HINT,
        400 => 'the API rejected the request itself - check the payload shape and '
            . 'the query parameter names against the endpoint\'s docstring',
        401 => 'credentials were rejected, or the token expired and could not be '
            . 'renewed - check client_id, client_secret and redirect_uri',
        403 => 'authenticated, but this client is not allowed to do that',
        404 => 'no such record - check the id you passed actually exists',
        405 => 'wrong HTTP method for this path',
        409 => 'conflicts with existing data, e.g. an email already in use',
        429 => 'rate limited - slow down. On a safe or idempotent method, raising '
            . 'max_retries makes the SDK wait and retry for you; a POST or a PATCH is '
            . 'never replayed on a 429, because a 429 is not proof the write did not '
            . 'apply - retry that one deliberately',
        500 => 'the server failed. Retrying may help on a read; the SDK will not '
            . 'retry a write on a 500, because it cannot tell whether the server '
            . 'committed',
    ];
}
