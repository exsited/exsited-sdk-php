<?php

declare(strict_types=1);

namespace Exsited\Client;

use Exsited\Config\SdkConfig;
use Exsited\Redaction;

/** One exchange rendered for a human at a terminal; everything shown passes through Redaction first.
 *  The curl reproduction is POSIX shell, not cmd.exe. */
final class Console
{
    /** The frame glyphs, written as escapes so this file holds no byte above 0x7f, and the ASCII set
     *  used when the console cannot carry them. */
    public const UNICODE_BOX_GLYPHS = [
        'top' => "\u{250c}",
        'bottom' => "\u{2514}",
        'tee' => "\u{251c}",
        'v' => "\u{2502}",
        'h' => "\u{2500}",
        'ellipsis' => "\u{2026}",
    ];

    public const ASCII_BOX_GLYPHS = [
        'top' => '+',
        'bottom' => '+',
        'tee' => '+',
        'v' => '|',
        'h' => '-',
        'ellipsis' => '...',
    ];

    private const WINDOWS_UTF8_CODE_PAGE = 65001;
    private const LOCALE_VARIABLES = ['LC_ALL', 'LC_CTYPE', 'LANG'];

    private const MULTIPART_PREFIX = '<multipart: ';
    private const PAYLOAD_FILES_KEY = 'files';
    private const PAYLOAD_FORM_KEY = 'form';
    private const CONTENT_TYPE_HEADER = 'Content-Type';
    private const JSON_CONTENT_TYPE = 'application/json';

    public static function renderJsonValue(mixed $value, bool $compact = false): string
    {
        if ($value === null) {
            return '<empty>';
        }
        if (is_string($value)) {
            if (!mb_check_encoding($value, 'UTF-8')) {
                return '<' . strlen($value) . ' bytes>';
            }
            if ($compact) {
                // Collapsed, not re-encoded, or `--data-raw` below carries a string literal.
                $document = self::jsonDocumentOneLine($value);
                if ($document !== null) {
                    return self::neutralise($document);
                }
                $json = json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                return self::neutralise(substr((string) $json, 1, -1));
            }
            // Re-indented so a payload carrying a secret renders like one that does not.
            $pretty = self::prettyJson($value);
            return self::neutralise($pretty ?? $value, true);
        }
        if (is_scalar($value)) {
            return self::neutralise(is_bool($value) ? ($value ? 'true' : 'false') : (string) $value);
        }
        $flags = JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | ($compact ? 0 : JSON_PRETTY_PRINT);
        $rendered = json_encode($value, $flags);
        if ($rendered === false) {
            return self::neutralise(self::safeText($value), true);
        }
        return self::neutralise($rendered, !$compact);
    }

    /** Read once and detached from the caller's live objects, which may change later.
     *  @return list<array{string,array{string,string}}> */
    public static function freezeMultipartLabels(#[\SensitiveParameter] mixed $files): array
    {
        $frozen = [];
        foreach (self::multipartEntries($files) as [$fieldName, $label]) {
            $frozen[] = [$fieldName, [$label, '']];
        }
        return $frozen;
    }

    public static function summarisePayload(mixed $body, mixed $files): mixed
    {
        $entries = self::multipartEntries($files);
        if ($entries === []) {
            return $body;
        }
        $names = implode(', ', array_map(static fn (array $e): string => "{$e[0]}={$e[1]}", $entries));
        $summary = self::MULTIPART_PREFIX . $names . '>';
        if ($body === null) {
            return $summary;
        }
        return [self::PAYLOAD_FILES_KEY => $summary, self::PAYLOAD_FORM_KEY => $body];
    }

    /** @param (callable(string): bool)|null $canEncode whether the console can carry a string; null
     *      asks the real console */
    public static function renderExchange(object $response, mixed $body, mixed $files, SdkConfig $config, bool $formEncoded = false, ?callable $canEncode = null): string
    {
        $info = $response->requestInfo;
        $payload = self::summarisePayload($body, $files);
        $glyphs = self::resolveBoxGlyphs($canEncode);
        $unicode = $glyphs === self::UNICODE_BOX_GLYPHS;

        if ($config->printFormat === SdkConfig::PRINT_FORMAT_COMPACT) {
            // Every field neutralised: the compact line is one line, and a CR in any of them
            // would forge a second.
            $parts = [
                'exsited',
                self::neutralise(self::safeText($info->clientName)),
                self::neutralise(self::safeText($info->httpMethod)),
                self::neutralise(self::safeText($info->url)),
                self::neutralise(self::safeText($response->statusCode)),
                "{$info->attemptCount}/{$info->maxAttempts}",
                "{$info->elapsedSeconds}s",
            ];
            if ($config->printRequestPayload) {
                $parts[] = 'payload=' . self::renderJsonValue(Redaction::redactValue($payload), true);
            }
            if ($config->printResponseBody) {
                // `map`, never `data`: the block shows the body the API sent.
                $parts[] = 'response=' . self::renderJsonValue(Redaction::redactValue($response->map), true);
            }
            return self::truncate(
                self::encodeForConsole(implode(' | ', $parts), $unicode),
                $config->printMaxChars,
                $glyphs['ellipsis']
            );
        }

        $colour = self::colourEnabled($config);
        $gutter = $glyphs['v'] . ' ';
        $lines = [self::rule($glyphs, 'top', 'Exsited', 46, $colour)];
        if ($config->printApiInfo) {
            foreach ([
                'client' => $info->clientName,
                'api version' => $info->apiVersion,
                'method' => $info->httpMethod,
                'endpoint' => $info->url,
                'params' => self::renderJsonValue($info->queryParams, true),
            ] as $label => $value) {
                $lines[] = $gutter . str_pad((string) $label, 12) . ' : ' . self::neutralise(self::safeText($value));
            }
            $lines[] = $gutter . str_pad('status', 12) . ' : '
                . self::status((string) $response->statusCode, $response->succeeded(), $colour);
            $lines[] = $gutter . str_pad('attempt', 12) . " : {$info->attemptCount} / {$info->maxAttempts}";
            $lines[] = $gutter . str_pad('elapsed', 12) . " : {$info->elapsedSeconds}s";
        }
        if ($config->printHeaders) {
            $lines[] = self::rule($glyphs, 'tee', 'request headers', 43, $colour);
            foreach ($info->headers as $name => $value) {
                $lines[] = $gutter . self::neutralise(self::safeText($name)) . ': ' . self::neutralise(self::safeText($value));
            }
            $lines[] = self::rule($glyphs, 'tee', 'response headers', 42, $colour);
            foreach (Redaction::redactMapping($response->headers) as $name => $value) {
                $lines[] = $gutter . self::neutralise(self::safeText($name)) . ': ' . self::neutralise(self::safeText($value));
            }
        }
        if ($config->printRequestPayload && $payload !== null) {
            $lines[] = self::rule($glyphs, 'tee', 'payload', 51, $colour);
            foreach (explode("\n", self::renderJsonValue(Redaction::redactValue($payload))) as $line) {
                $lines[] = $gutter . $line;
            }
        }
        if ($config->printResponseBody) {
            $lines[] = self::rule($glyphs, 'tee', 'response', 50, $colour);
            foreach (explode("\n", self::renderJsonValue(Redaction::redactValue($response->map))) as $line) {
                $lines[] = $gutter . $line;
            }
        }
        if ($config->printCurl) {
            $lines[] = self::rule($glyphs, 'tee', 'curl (POSIX shell)', 40, $colour);
            foreach (explode("\n", self::buildCurlCommand($response, $payload, $files, $config, $formEncoded)) as $line) {
                $lines[] = $gutter . $line;
            }
        }
        $lines[] = self::dim($glyphs['bottom'] . str_repeat($glyphs['h'], 61), $colour);
        return self::truncate(
            self::encodeForConsole(implode("\n", $lines), $unicode),
            $config->printMaxChars,
            $glyphs['ellipsis']
        );
    }

    /** @param array<string,string> $glyphs */
    private static function rule(array $glyphs, string $corner, string $label, int $fill, bool $colour): string
    {
        return self::dim(
            $glyphs[$corner] . $glyphs['h'] . ' ' . $label . ' ' . str_repeat($glyphs['h'], $fill),
            $colour
        );
    }

    /** The Unicode frame when the console can carry it, the ASCII one otherwise.
     *  @param (callable(string): bool)|null $canEncode
     *  @return array<string,string> */
    public static function resolveBoxGlyphs(?callable $canEncode = null): array
    {
        $canEncode ??= self::consoleCanEncode(...);
        return $canEncode(implode('', self::UNICODE_BOX_GLYPHS))
            ? self::UNICODE_BOX_GLYPHS
            : self::ASCII_BOX_GLYPHS;
    }

    private static function consoleCanEncode(string $text): bool
    {
        if (preg_match('/[\x80-\xff]/', $text) !== 1) {
            return true;
        }
        return self::consoleCarriesUtf8();
    }

    /** A terminal on the UTF-8 code page, or a locale naming UTF-8; a pipe or a file is not assumed to. */
    private static function consoleCarriesUtf8(): bool
    {
        if (!defined('STDOUT') || !function_exists('stream_isatty') || !@stream_isatty(STDOUT)) {
            return false;
        }
        if (PHP_OS_FAMILY === 'Windows') {
            if (!function_exists('sapi_windows_cp_get')) {
                return false;
            }
            return @sapi_windows_cp_get() === self::WINDOWS_UTF8_CODE_PAGE;
        }
        foreach (self::LOCALE_VARIABLES as $name) {
            $value = getenv($name);
            if ($value === false || $value === '') {
                continue;
            }
            return stripos(str_replace('-', '', $value), 'utf8') !== false;
        }
        return false;
    }

    /** On a console that cannot carry Unicode, every non-ASCII character is written as an escape
     *  rather than left for the code page to turn into mojibake. */
    private static function encodeForConsole(string $text, bool $consoleCarriesUnicode): string
    {
        if ($consoleCarriesUnicode) {
            return $text;
        }
        if (!mb_check_encoding($text, 'UTF-8')) {
            return preg_replace_callback(
                '/[\x80-\xff]/',
                static fn (array $m): string => sprintf('\\x%02x', ord($m[0])),
                $text
            ) ?? $text;
        }
        $out = '';
        foreach (mb_str_split($text, 1, 'UTF-8') as $char) {
            if (strlen($char) === 1) {
                $out .= $char;
                continue;
            }
            $codepoint = mb_ord($char, 'UTF-8');
            if ($codepoint === false) {
                $out .= str_repeat('?', strlen($char));
                continue;
            }
            $out .= $codepoint <= 0xffff
                ? sprintf('\\u%04x', $codepoint)
                : sprintf('\\U%08x', $codepoint);
        }
        return $out;
    }

    public static function buildCurlCommand(object $response, mixed $payload, mixed $files, SdkConfig $config, bool $formEncoded = false): string
    {
        $info = $response->requestInfo;
        $url = self::neutralise(self::safeText($info->url));
        if ($info->queryParams !== []) {
            $separator = str_contains($url, '?') ? '&' : '?';
            $url .= $separator . self::buildQueryString($info->queryParams);
        }

        $parts = ['curl -X ' . self::posixQuote($info->httpMethod) . ' ' . self::posixQuote($url)];
        if (!$config->verifySsl) {
            $parts[] = '  -k';
        }
        $headers = $info->headers;
        ksort($headers);
        foreach ($headers as $name => $value) {
            $header = self::neutralise(self::safeText($name)) . ': ' . self::neutralise(self::safeText($value));
            $parts[] = '  -H ' . self::posixQuote($header);
        }

        $entries = self::multipartEntries($files);
        $formBody = self::formPart($payload);
        foreach ($entries as [$field, $filename]) {
            $parts[] = '  -F ' . self::posixQuote(self::neutralise($field) . '=@' . self::neutralise($filename));
        }
        if ($entries !== []) {
            foreach (self::formFields($formBody) as [$key, $value]) {
                $parts[] = '  -F ' . self::posixQuote(self::neutralise(self::safeText($key)) . '=' . self::neutralise(self::safeText($value)));
            }
        } elseif ($formBody !== null) {
            $fields = $formEncoded ? self::formFields($formBody) : [];
            if ($fields !== []) {
                foreach ($fields as [$key, $value]) {
                    $parts[] = '  --data-urlencode ' . self::posixQuote(self::neutralise(self::safeText($key)) . '=' . self::neutralise(self::safeText($value)));
                }
            } else {
                $rendered = self::renderJsonValue(Redaction::redactValue($formBody), true);
                if (!$formEncoded && !self::namesContentType($info->headers)) {
                    $parts[] = '  -H ' . self::posixQuote(self::CONTENT_TYPE_HEADER . ': ' . self::JSON_CONTENT_TYPE);
                }
                $parts[] = '  --data-raw ' . self::posixQuote($rendered);
            }
        }
        return implode(" \\\n", $parts);
    }

    /** @param array<string,mixed> $params */
    private static function buildQueryString(array $params): string
    {
        $pairs = [];
        foreach ($params as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $item) {
                    $pairs[] = rawurlencode((string) $key) . '=' . self::encodeKeepMarker((string) $item);
                }
            } else {
                $pairs[] = rawurlencode((string) $key) . '=' . self::encodeKeepMarker(is_bool($value) ? ($value ? 'true' : 'false') : (string) $value);
            }
        }
        return implode('&', $pairs);
    }

    private static function encodeKeepMarker(string $value): string
    {
        // Keep a redacted value readable as api_key=*** rather than %2A%2A%2A.
        return str_replace('%2A', '*', rawurlencode($value));
    }

    /** @return list<array{string,string}> */
    private static function multipartEntries(mixed $files): array
    {
        if (is_array($files)) {
            if (array_is_list($files) && $files !== []
                && array_reduce($files, static fn ($c, $e) => $c && is_array($e) && count($e) === 2, true)) {
                return array_map(static fn (array $e): array => self::multipartEntry((string) array_values($e)[0], array_values($e)[1]), $files);
            }
            $out = [];
            foreach ($files as $key => $value) {
                $out[] = self::multipartEntry((string) $key, $value);
            }
            return $out;
        }
        if (is_object($files) && method_exists($files, 'read')) {
            return [self::multipartEntry('file', $files)];
        }
        return [];
    }

    /** @return array{string,string} */
    private static function multipartEntry(string $fieldName, mixed $value): array
    {
        $filename = null;
        $handle = $value;
        if (is_array($value) && $value !== []) {
            $vals = array_values($value);
            if (is_string($vals[0])) {
                $filename = $vals[0];
            }
            $handle = $vals[1] ?? null;
        }
        $name = $filename
            ?? (is_object($handle) && property_exists($handle, 'filename') ? $handle->filename : null)
            ?? 'file';
        return [$fieldName, (string) $name];
    }

    private static function formPart(mixed $payload): mixed
    {
        if (is_array($payload)
            && array_keys($payload) === [self::PAYLOAD_FILES_KEY, self::PAYLOAD_FORM_KEY]
            && is_string($payload[self::PAYLOAD_FILES_KEY])
            && str_starts_with($payload[self::PAYLOAD_FILES_KEY], self::MULTIPART_PREFIX)) {
            return $payload[self::PAYLOAD_FORM_KEY];
        }
        return $payload;
    }

    /** @return list<array{mixed,mixed}> */
    private static function formFields(mixed $body): array
    {
        if (is_array($body) && !array_is_list($body)) {
            $redacted = Redaction::redactValue($body);
            $out = [];
            foreach ($redacted as $key => $value) {
                $out[] = [$key, $value];
            }
            return $out;
        }
        if (is_array($body) && array_is_list($body) && $body !== []
            && array_reduce($body, static fn ($c, $e) => $c && is_array($e) && count($e) === 2, true)) {
            $redacted = Redaction::redactValue($body);
            return array_map(static fn (array $e): array => [array_values($e)[0], array_values($e)[1]], $redacted);
        }
        return [];
    }

    /** @param array<string,mixed> $headers */
    private static function namesContentType(array $headers): bool
    {
        foreach ($headers as $name => $_) {
            if (strcasecmp(self::safeText($name), self::CONTENT_TYPE_HEADER) === 0) {
                return true;
            }
        }
        return false;
    }

    private static function prettyJson(string $text): ?string
    {
        $decoded = self::decodeJsonDocument($text);
        if ($decoded === null) {
            return null;
        }
        $pretty = json_encode($decoded, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        return $pretty === false ? null : $pretty;
    }

    /** The caller's own bytes minus line breaks, so no newline forges a printed line; still valid JSON,
     *  as `--data-raw` renders through here and an escaped `\n` would survive POSIX single quotes. */
    private static function jsonDocumentOneLine(string $text): ?string
    {
        if (self::decodeJsonDocument($text) === null) {
            return null;
        }
        // Anchored on the newline: a leading `\s*` backtracks across a long run.
        return preg_replace('/[\n\r\t]\s*/', '', $text) ?? $text;
    }

    /** Null when the text is not a JSON object or array; a bare `42` is not one. */
    private static function decodeJsonDocument(string $text): ?array
    {
        $trimmed = ltrim($text);
        if ($trimmed === '' || ($trimmed[0] !== '{' && $trimmed[0] !== '[')) {
            return null;
        }
        $decoded = json_decode($text, true);
        if (json_last_error() !== JSON_ERROR_NONE || !is_array($decoded)) {
            return null;
        }
        return $decoded;
    }

    private static function posixQuote(string $value): string
    {
        return "'" . str_replace("'", "'\\''", $value) . "'";
    }

    /** Forced off by NO_COLOR and TERM=dumb, neither of which isatty() knows about. */
    private static function colourEnabled(SdkConfig $config): bool
    {
        if (!$config->printColor) {
            return false;
        }
        if (getenv('NO_COLOR') !== false && getenv('NO_COLOR') !== '') {
            return false;
        }
        if (getenv('TERM') === 'dumb') {
            return false;
        }
        if (function_exists('stream_isatty')) {
            return @stream_isatty(STDOUT);
        }
        return false;
    }

    private static function dim(string $text, bool $enabled): string
    {
        return $enabled ? "\x1b[2m{$text}\x1b[0m" : $text;
    }

    private static function status(string $text, bool $succeeded, bool $enabled): string
    {
        if (!$enabled) {
            return $text;
        }
        return "\x1b[" . ($succeeded ? '32' : '31') . "m{$text}\x1b[0m";
    }

    /** Escapes `\xNN` up to 0xff and `\uNNNN` for U+2028 and U+2029, applied byte by
     *  byte: a `/u` pattern fails on invalid UTF-8 and would hand the controls back unescaped. */
    private static function neutralise(string $text, bool $keepNewlines = false): string
    {
        $out = '';
        $length = strlen($text);
        for ($i = 0; $i < $length; $i++) {
            $byte = ord($text[$i]);
            if ($byte < 0x80) {
                if (($byte > 0x1f && $byte !== 0x7f) || ($keepNewlines && $byte === 0x0a)) {
                    $out .= $text[$i];
                } else {
                    $out .= sprintf('\\x%02x', $byte);
                }
                continue;
            }
            if ($byte === 0xc2 && $i + 1 < $length) {
                $next = ord($text[$i + 1]);
                if ($next >= 0x80 && $next <= 0x9f) {
                    $out .= sprintf('\\x%02x', $next);
                    $i++;
                    continue;
                }
            }
            if ($byte === 0xe2 && $i + 2 < $length && $text[$i + 1] === "\x80"
                && ($text[$i + 2] === "\xa8" || $text[$i + 2] === "\xa9")) {
                $out .= $text[$i + 2] === "\xa8" ? '\\u2028' : '\\u2029';
                $i += 2;
                continue;
            }
            $out .= $text[$i];
        }
        return $out;
    }

    private static function safeText(mixed $value): string
    {
        if (is_string($value)) {
            return $value;
        }
        if ($value === null) {
            return '';
        }
        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }
        if (is_scalar($value)) {
            return (string) $value;
        }
        $encoded = json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        return $encoded !== false ? $encoded : '<' . get_debug_type($value) . '>';
    }

    /** The cut leaves room for its own marker, so the result is at most `$maxChars` long. */
    private static function truncate(string $text, int $maxChars, string $ellipsis): string
    {
        $length = mb_strlen($text);
        if ($maxChars <= 0 || $length <= $maxChars) {
            return $text;
        }
        $reserved = mb_strlen($ellipsis) + mb_strlen(" +{$length} chars");
        if (str_contains($text, "\x1b")) {
            $reserved += mb_strlen("\x1b[0m");
        }
        $cut = mb_substr($text, 0, max(0, $maxChars - $reserved));
        // Close any open colour run, or a cut inside one leaves the terminal dim.
        if (str_contains($cut, "\x1b")) {
            $cut .= "\x1b[0m";
        }
        return $cut . $ellipsis . ' +' . ($length - mb_strlen($cut)) . ' chars';
    }
}
