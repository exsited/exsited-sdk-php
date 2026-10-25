<?php

declare(strict_types=1);

namespace Exsited;

/** The one place that decides what counts as a secret, so a new marker covers every output. Walks
 *  copies, never its input. */
final class Redaction
{
    public const REDACTED = '***';
    public const TOO_DEEP = '<...>';
    public const CIRCULAR = '<circular>';
    public const MAX_DEPTH = 64;
    public const WITHHELD_PREFIX = '<withheld ';

    public const SENSITIVE_KEY_MARKERS = [
        'secret', 'password', 'passphrase', 'passwd', 'pwd', 'token', 'bearer', 'jwt',
        'authorization', 'authstring', 'apikey', 'assertion', 'credential', 'verifier',
        'cookie', 'session', 'signature', 'privatekey',
    ];

    private const NON_SECRET_TAIL_WORDS = [
        // 'expired': customer_password_expired is a boolean, never the password.
        'amount', 'at', 'consent', 'count', 'duration', 'expired', 'level', 'path', 'policy',
        'remaining', 'status', 'type',
    ];

    private const NON_SECRET_LEAD_WORDS = ['has', 'is', 'was'];

    public static function shouldRedact(string $key): bool
    {
        $words = self::keyWords($key);
        if ($words !== []) {
            if (in_array($words[0], self::NON_SECRET_LEAD_WORDS, true)
                || in_array($words[count($words) - 1], self::NON_SECRET_TAIL_WORDS, true)) {
                return false;
            }
        }
        $normalised = implode('', $words);
        foreach (self::SENSITIVE_KEY_MARKERS as $marker) {
            if ($normalised !== '' && str_contains($normalised, $marker)) {
                return true;
            }
        }
        return false;
    }

    /** Deep-copy a value, replacing secret-looking entries with REDACTED. Never throws. */
    public static function redactValue(mixed $value): mixed
    {
        return self::redact($value, 0);
    }

    /** Redact a mapping such as headers; every value takes the full {@see redact()} walk.
     *  @param array<string,mixed>|null $headers
     *  @return array<string,mixed> */
    public static function redactMapping(?array $headers): array
    {
        if (!$headers) {
            return [];
        }
        $out = [];
        foreach ($headers as $key => $value) {
            $out[$key] = self::shouldRedact((string) $key)
                ? self::REDACTED
                : self::redact($value, 0);
        }
        return $out;
    }

    /** Redact every URL and schemeless `path?query` in free text; a body or a payload goes
     *  through {@see redactValue()} instead. */
    public static function redactText(string $value): string
    {
        $cleaned = preg_replace_callback(
            '#[A-Za-z][A-Za-z0-9+.\-]*://[^\s<>"\']*#',
            static fn (array $m): string => self::redactOneUrl($m[0]),
            $value
        ) ?? $value;
        $cleaned = preg_replace_callback(
            '#/[^\s<>"\'?\#]*[?\#][^\s<>"\']+#',
            static fn (array $m): string => self::redactOneUrl($m[0]),
            $cleaned
        ) ?? $cleaned;
        return self::redactFormBody($cleaned);
    }

    /** Neither URL pass in {@see redactText()} reaches a bare `name=value` body - no scheme,
     *  no leading `/`. Narrow on purpose: prose carrying an `=` is left as it was. */
    private static function redactFormBody(string $text): string
    {
        if ($text === '' || !str_contains($text, '=') || preg_match('/\s/', $text) === 1) {
            return $text;
        }
        if (preg_match('#^[^&=]+=[^&]*(?:&[^&=]+=[^&]*)*$#', $text) !== 1) {
            return $text;
        }
        return self::redactQueryString($text);
    }

    /** Render name=value pairs for a toString, redacting secret-named fields.
     *  @param list<string> $fieldNames
     *  @return list<string> */
    public static function redactFields(object $instance, array $fieldNames): array
    {
        $shown = [];
        foreach ($fieldNames as $name) {
            $value = $instance->$name ?? null;
            if ($value && self::shouldRedact($name)) {
                $rendered = self::REDACTED;
            } else {
                $rendered = self::redactValue($value);
            }
            $shown[] = $name . '=' . self::repr($rendered);
        }
        return $shown;
    }

    private static function redact(mixed $value, int $depth): mixed
    {
        if (is_array($value)) {
            if ($depth >= self::MAX_DEPTH) {
                return self::TOO_DEEP;
            }
            if (array_is_list($value)) {
                $out = [];
                foreach ($value as $entry) {
                    $out[] = self::redactEntry($entry, $depth + 1);
                }
                return $out;
            }
            $out = [];
            foreach ($value as $key => $item) {
                $out[$key] = self::shouldRedact((string) $key)
                    ? self::REDACTED
                    : self::redact($item, $depth + 1);
            }
            return $out;
        }
        if (is_object($value)) {
            if ($depth >= self::MAX_DEPTH) {
                return self::TOO_DEEP;
            }
            // An object is never walked: a stream, a handle wrapper and a plain value object
            // alike are reported as their type and nothing else.
            return '<' . get_debug_type($value) . '>';
        }
        if (is_resource($value)) {
            return '<resource>';
        }
        if (is_string($value)) {
            // Not both: the walk already reaches every string inside a document, and a
            // second redactText() pass reads compact JSON as a form body and cuts it short.
            return self::isStructuredText($value)
                ? self::redactStructuredValue($value, $depth)
                : self::redactText($value);
        }
        return $value;
    }

    private static function redactEntry(mixed $entry, int $depth): mixed
    {
        if (is_array($entry) && array_is_list($entry) && count($entry) === 2
            && is_string($entry[0]) && self::shouldRedact($entry[0])) {
            return [$entry[0], self::REDACTED];
        }
        return self::redact($entry, $depth);
    }

    private static function isStructuredText(string $text): bool
    {
        $trimmed = ltrim($text);
        return $trimmed !== '' && ($trimmed[0] === '{' || $trimmed[0] === '[');
    }

    /** A body that will not parse has unknown keys, so it is replaced by its type and size
     *  rather than echoed: one byte short of valid still carries the password in it. */
    private static function redactStructuredValue(string $text, int $depth): string
    {
        $trimmed = ltrim($text);
        $parsed = json_decode($text, true);
        if ($parsed === null && json_last_error() !== JSON_ERROR_NONE) {
            return self::withheldStructured($trimmed[0], $text);
        }
        $redacted = self::redact($parsed, $depth + 1);
        if ($redacted === $parsed) {
            return $text;
        }
        $encoded = json_encode($redacted, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        return $encoded !== false ? $encoded : self::withheldStructured($trimmed[0], $text);
    }

    /** Type and size, never content. */
    private static function withheldStructured(string $leadingByte, string $text): string
    {
        $shape = $leadingByte === '[' ? 'json array' : 'json object';
        return self::WITHHELD_PREFIX . 'unparsable ' . $shape . ', ' . strlen($text) . ' byte(s)>';
    }

    private static function redactOneUrl(string $url): string
    {
        $fragment = null;
        $main = $url;
        $hashPos = strpos($main, '#');
        if ($hashPos !== false) {
            $fragment = substr($main, $hashPos + 1);
            $main = substr($main, 0, $hashPos);
        }
        $query = null;
        $base = $main;
        $qPos = strpos($base, '?');
        if ($qPos !== false) {
            $query = substr($base, $qPos + 1);
            $base = substr($base, 0, $qPos);
        }
        $newBase = self::redactUserinfo($base);
        $newQuery = $query === null ? null : self::redactQueryString($query);
        $newFragment = $fragment === null ? null : self::redactQueryString($fragment);
        if ($newBase === $base && $newQuery === $query && $newFragment === $fragment) {
            return $url;
        }
        $result = $newBase;
        if ($newQuery !== null) {
            $result .= '?' . $newQuery;
        }
        if ($newFragment !== null) {
            $result .= '#' . $newFragment;
        }
        return $result;
    }

    private static function redactUserinfo(string $base): string
    {
        $pos = strpos($base, '://');
        if ($pos === false) {
            return $base;
        }
        $afterScheme = $pos + 3;
        $slash = strpos($base, '/', $afterScheme);
        $netloc = $slash === false
            ? substr($base, $afterScheme)
            : substr($base, $afterScheme, $slash - $afterScheme);
        $at = strrpos($netloc, '@');
        if ($at === false) {
            return $base;
        }
        $userinfo = substr($netloc, 0, $at);
        $host = substr($netloc, $at + 1);
        if (!str_contains($userinfo, ':')) {
            return $base;
        }
        $user = substr($userinfo, 0, (int) strpos($userinfo, ':'));
        $rest = $slash === false ? '' : substr($base, $slash);
        return substr($base, 0, $afterScheme) . $user . ':' . self::REDACTED . '@' . $host . $rest;
    }

    private static function redactQueryString(string $query): string
    {
        if ($query === '') {
            return $query;
        }
        $rewritten = [];
        $matched = false;
        foreach (explode('&', $query) as $chunk) {
            $eq = strpos($chunk, '=');
            if ($eq !== false) {
                $name = substr($chunk, 0, $eq);
                if (self::shouldRedact(urldecode($name))) {
                    $rewritten[] = $name . '=' . self::REDACTED;
                    $matched = true;
                    continue;
                }
            }
            $rewritten[] = $chunk;
        }
        return $matched ? implode('&', $rewritten) : $query;
    }

    /** @return list<string> */
    private static function keyWords(string $key): array
    {
        $parts = preg_split('/[^A-Za-z0-9]+|(?<=[a-z0-9])(?=[A-Z])/', $key);
        if ($parts === false) {
            return [];
        }
        $words = [];
        foreach ($parts as $word) {
            if ($word !== '') {
                $words[] = strtolower($word);
            }
        }
        return $words;
    }

    private static function repr(mixed $value): string
    {
        if (is_string($value)) {
            return "'" . $value . "'";
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
        $encoded = json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        return $encoded !== false ? $encoded : '<' . get_debug_type($value) . '>';
    }
}
