<?php

declare(strict_types=1);

namespace Exsited\Sdk\Client;

use Closure;
use Exsited\Sdk\Config\SdkConfig;
use Exsited\Sdk\Errors\SdkAttributeError;
use Exsited\Sdk\Errors\SdkAuthError;
use Exsited\Sdk\Errors\SdkError;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Redaction;

/** One HTTP exchange, not a model of the resource.
 *  @property-read mixed $data the body in the resolved responseFormat, null where that form has none
 *  @property-read mixed $map the decoded body
 *  @property-read string|null $json the body text; null for a binary body
 *  @property-read Dto|null $dto the typed view, built on first read */
final class ApiResponse
{
    private const MAX_REPORTED_MESSAGES = 50;
    private const MAX_MESSAGE_DEPTH = 4;
    /** The key every v4 body names itself with, and the only one that can deny a 2xx. */
    private const OBJECT_KEY = 'object';
    private const ERROR_OBJECT = 'error';
    private const BODY_MEMBERS = ['data', 'map', 'json', 'dto'];

    public readonly ErrorType $errorType;

    /** Read by everything here; `succeeded()` must not follow a display setting. */
    private readonly mixed $decodedBody;
    private readonly ?string $bodyText;
    private readonly string $responseFormat;
    /** @var class-string<Dto>|(Closure(array<string,mixed>): Dto)|null */
    private readonly string|Closure|null $dtoType;
    private bool $dtoBuilt = false;
    private ?Dto $dtoValue = null;

    /** @param array<string,string> $headers
     *  @param string|null $bodyText the body as it arrived; null when binary or empty
     *  @param string $responseFormat `map`, `json` or `dto`
     *  @param class-string<Dto>|(Closure(array<string,mixed>): Dto)|null $dtoType */
    public function __construct(
        public readonly int $statusCode,
        mixed $data,
        public readonly array $headers,
        public readonly ?string $contentType,
        public readonly RequestInfo $requestInfo,
        ErrorType $errorType = ErrorType::None,
        ?string $bodyText = null,
        string $responseFormat = SdkConfig::DEFAULT_RESPONSE_FORMAT,
        string|Closure|null $dtoType = null,
    ) {
        $this->decodedBody = $data;
        $this->bodyText = $bodyText;
        $this->responseFormat = self::requireResponseFormat($responseFormat);
        // A name that is not a DTO class is dropped, not raised on: `dto` reads null.
        $this->dtoType = $dtoType instanceof Closure || (is_string($dtoType) && is_a($dtoType, Dto::class, true))
            ? $dtoType
            : null;

        // The denial must reach classify() too, or a 2xx keeps ErrorType::None.
        if ($errorType === ErrorType::None && !$this->succeeded()) {
            $errorType = ErrorType::classify($statusCode, self::bodyDeniesSuccess($this->decodedBody));
        }
        $this->errorType = $errorType;
    }

    public function __get(string $name): mixed
    {
        return match ($name) {
            'data' => $this->resolveData(),
            'map' => $this->decodedBody,
            'json' => $this->bodyText,
            'dto' => $this->buildDto(),
            default => throw new SdkAttributeError(
                "ApiResponse has no member '{$name}'; the body is on data, map, json or dto"
            ),
        };
    }

    public function __isset(string $name): bool
    {
        return in_array($name, self::BODY_MEMBERS, true) && $this->__get($name) !== null;
    }

    /** Declared so a write cannot create a dynamic property that later reads would return. */
    public function __set(string $name, mixed $value): void
    {
        throw new SdkUsageError(
            "ApiResponse::\${$name} cannot be assigned: a response is one exchange as it happened, "
            . 'not a value to edit'
        );
    }

    /** A 2xx and a body that agrees: a v4 error envelope names itself `{"object": "error"}`,
     *  and one can arrive under a 2xx. */
    public function succeeded(): bool
    {
        return $this->statusCode >= 200
            && $this->statusCode < 300
            && !self::bodyDeniesSuccess($this->decodedBody);
    }

    /** @return list<string> problems from an error body, most specific tier first */
    public function getErrorMessages(): array
    {
        $body = is_array($this->decodedBody) ? $this->decodedBody : self::parseJsonBody($this->decodedBody);
        if ($body === null) {
            return [];
        }
        $messages = self::readErrorEntries($body['errors'] ?? null);
        if ($messages === []) {
            $messages = self::readMessageValue($body['message'] ?? null);
        }
        if ($messages === []) {
            // `code` first: it is the v4 envelope's own key, and reached only without an
            // `errors[]` list or a `message`, so a record carrying its own `code` is not read.
            $messages = self::readMessageValue($body['code'] ?? null);
            if ($messages === []) {
                $messages = self::readMessageValue($body['error'] ?? null);
            }
            if ($messages === []) {
                $messages = self::readMessageValue($body['errorCode'] ?? null);
            }
        }
        if ($messages === []) {
            // RFC 7807: a gateway answering instead of the API carries none of its keys.
            $messages = self::readMessageValue($body['detail'] ?? null);
            if ($messages === []) {
                $messages = self::readMessageValue($body['title'] ?? null);
            }
        }
        return self::capMessages($messages);
    }

    public function raiseForStatus(): self
    {
        if ($this->succeeded()) {
            return $this;
        }
        $messages = $this->getErrorMessages();
        $reported = count($messages);
        $summary = "the Exsited API answered {$this->statusCode} and the call did not succeed; "
            . ($reported === 0
                ? 'it reported no problem of its own'
                : "the {$reported} problem(s) it reported are on getErrorMessages(), withheld here "
                    . 'because the API words them with the values it rejected');
        $class = in_array($this->statusCode, [401, 403], true) ? SdkAuthError::class : SdkError::class;
        throw new $class(
            $summary,
            statusCode: $this->statusCode,
            errorType: $this->errorType,
            rawResponse: Redaction::redactValue($this->decodedBody),
            responseHeaders: Redaction::redactMapping($this->headers),
            requestInfo: $this->requestInfo,
            errors: $messages,
        );
    }

    private static function requireResponseFormat(string $responseFormat): string
    {
        $chosen = strtolower(trim($responseFormat));
        if (!in_array($chosen, SdkConfig::VALID_RESPONSE_FORMATS, true)) {
            throw new SdkUsageError(
                'response_format: expected one of ' . implode(', ', SdkConfig::VALID_RESPONSE_FORMATS)
                . ", got '{$responseFormat}'"
            );
        }
        return $chosen;
    }

    private function resolveData(): mixed
    {
        return match ($this->responseFormat) {
            SdkConfig::RESPONSE_FORMAT_JSON => $this->bodyText,
            SdkConfig::RESPONSE_FORMAT_DTO => $this->buildDto(),
            default => $this->decodedBody,
        };
    }

    private function buildDto(): ?Dto
    {
        if ($this->dtoBuilt) {
            return $this->dtoValue;
        }
        $this->dtoBuilt = true;
        // Not from a failed call either: an error envelope is a map, and would read as a
        // record of the named type whose every field is null.
        if ($this->dtoType === null || !is_array($this->decodedBody) || !$this->succeeded()) {
            return null;
        }
        $type = $this->dtoType;
        $this->dtoValue = $type instanceof Closure
            ? $type($this->decodedBody)
            : $type::fromMap($this->decodedBody);
        return $this->dtoValue;
    }

    /** Keyed on `object == "error"` alone, compared case-insensitively and only for a string:
     *  a message's presence is not a failure, and `"error_free"` is not `"error"`. */
    private static function bodyDeniesSuccess(mixed $data): bool
    {
        if (!is_array($data)) {
            return false;
        }
        $objectName = $data[self::OBJECT_KEY] ?? null;
        return is_string($objectName) && strtolower(trim($objectName)) === self::ERROR_OBJECT;
    }

    /** @return array<string,mixed>|null */
    private static function parseJsonBody(mixed $data): ?array
    {
        if (!is_string($data)) {
            return null;
        }
        $text = ltrim($data);
        if (str_starts_with($text, "\xEF\xBB\xBF")) {
            $text = substr($text, 3);
        }
        $text = ltrim($text);
        if ($text === '' || ($text[0] !== '{' && $text[0] !== '[')) {
            return null;
        }
        $parsed = json_decode($text, true);
        return is_array($parsed) ? $parsed : null;
    }

    /** @return list<string> */
    private static function readErrorEntries(mixed $entries): array
    {
        if (is_array($entries) && !array_is_list($entries)) {
            $messages = [];
            foreach ($entries as $field => $value) {
                $messages = array_merge($messages, self::prefixField($field, self::readMessageValue($value)));
            }
            return $messages;
        }
        if (is_array($entries)) {
            $messages = [];
            foreach ($entries as $entry) {
                if (is_array($entry) && !array_is_list($entry)) {
                    $text = $entry['message'] ?? ($entry['code'] ?? null);
                    $messages = array_merge($messages, self::prefixField($entry['field'] ?? null, self::readMessageValue($text)));
                } else {
                    $messages = array_merge($messages, self::readMessageValue($entry));
                }
            }
            return $messages;
        }
        if (is_string($entries)) {
            return self::readMessageValue($entries);
        }
        return [];
    }

    /** @return list<string> */
    private static function readMessageValue(mixed $value, int $depth = 0): array
    {
        if ($value === null || $depth > self::MAX_MESSAGE_DEPTH) {
            return [];
        }
        if (is_string($value)) {
            return trim($value) !== '' ? [$value] : [];
        }
        if (is_array($value)) {
            if (!array_is_list($value)) {
                $text = $value['message'] ?? ($value['code'] ?? null);
                return self::readMessageValue($text, $depth + 1);
            }
            $messages = [];
            foreach ($value as $item) {
                $messages = array_merge($messages, self::readMessageValue($item, $depth + 1));
            }
            return $messages;
        }
        $text = is_bool($value) ? ($value ? 'true' : 'false') : (string) $value;
        return trim($text) !== '' ? [$text] : [];
    }

    /** @param list<string> $messages @return list<string> */
    private static function prefixField(mixed $fieldName, array $messages): array
    {
        if ($fieldName === null || trim((string) $fieldName) === '') {
            return $messages;
        }
        return array_map(static fn (string $m): string => "{$fieldName}: {$m}", $messages);
    }

    /** @param list<string> $messages @return list<string> */
    private static function capMessages(array $messages): array
    {
        if (count($messages) <= self::MAX_REPORTED_MESSAGES) {
            return $messages;
        }
        $remainder = count($messages) - self::MAX_REPORTED_MESSAGES;
        return array_merge(
            array_slice($messages, 0, self::MAX_REPORTED_MESSAGES),
            ["+{$remainder} more problems"]
        );
    }
}
