<?php

declare(strict_types=1);

namespace Exsited\Http;

use Exsited\Errors\SdkUsageError;
use Exsited\Redaction;

final class UrlBuilder
{
    private const PLACEHOLDER = '/\{([a-z_][a-z0-9_]*)\}/';
    private const ABSOLUTE_PREFIXES = ['http://', 'https://'];
    private const IMPLIED_PORTS = ['http' => 80, 'https' => 443];

    /** @return list<string> */
    public static function findPathParamNames(string $template): array
    {
        [$body] = self::splitTemplate($template);
        preg_match_all(self::PLACEHOLDER, $body, $matches);
        $seen = [];
        foreach ($matches[1] as $name) {
            $seen[$name] = true;
        }
        return array_keys($seen);
    }

    public static function rejectFragment(string $field, string $value): void
    {
        if (!str_contains($value, '#')) {
            return;
        }
        throw new SdkUsageError(
            "{$field}: carries a fragment, and everything from the \"#\" on is stripped before "
            . 'the request is made - so the target accepted here is not the target that would '
            . 'be requested, and nothing would say so. Strip it: a fragment is a client-side '
            . 'anchor and means nothing to an HTTP API'
        );
    }

    /** @param array<string,mixed>|null $pathParams */
    public static function substitutePathParams(string $template, ?array $pathParams = null): string
    {
        self::rejectFragment('path', $template);
        [$body, $queryAndFragment] = self::splitTemplate($template);
        $expected = self::findPathParamNames($template);
        $supplied = $pathParams ?? [];

        $problems = [];
        $missing = array_values(array_filter($expected, static fn ($n) => !array_key_exists($n, $supplied)));
        if ($missing) {
            sort($missing);
            $problems[] = 'missing path params: ' . implode(', ', $missing);
        }
        $unknown = array_values(array_filter(array_keys($supplied), static fn ($n) => !in_array($n, $expected, true)));
        if ($unknown) {
            sort($unknown);
            $problems[] = 'unknown path params: ' . implode(', ', $unknown);
        }
        $given = array_values(array_filter($expected, static fn ($n) => array_key_exists($n, $supplied)));
        $blank = array_values(array_filter($given, static fn ($n) => self::isBlank($supplied[$n])));
        if ($blank) {
            sort($blank);
            $problems[] = 'blank path params: ' . implode(', ', $blank);
        }
        $wrongTyped = [];
        foreach ($given as $name) {
            if (!in_array($name, $blank, true) && !self::isUsable($supplied[$name])) {
                $wrongTyped[] = $name . ' (' . get_debug_type($supplied[$name]) . ')';
            }
        }
        if ($wrongTyped) {
            sort($wrongTyped);
            $problems[] = 'wrong-typed path params: ' . implode(', ', $wrongTyped);
        }
        // Checked here, beside the other argument problems, so the refusal lands before any
        // encoding and before the token grant.
        $dotOnly = [];
        foreach ($given as $name) {
            $wrong = array_map(static fn ($e) => explode(' ', $e)[0], $wrongTyped);
            if (!in_array($name, $blank, true)
                && !in_array($name, $wrong, true)
                && self::isDotOnly(self::paramText($supplied[$name]))) {
                $dotOnly[] = $name;
            }
        }
        if ($dotOnly) {
            sort($dotOnly);
            $problems[] = 'dot-only path params: ' . implode(', ', $dotOnly)
                . ' - a value of only dots resolves to a different endpoint, so it is refused'
                . ' rather than sent';
        }
        if ($problems) {
            throw new SdkUsageError("{$template} -> " . implode('; ', $problems));
        }

        $substituted = preg_replace_callback(
            self::PLACEHOLDER,
            static fn (array $m): string => rawurlencode(self::paramText($supplied[$m[1]])),
            $body
        );
        if ($substituted === null || str_contains($substituted, '{') || str_contains($substituted, '}')) {
            // The template names the brace that did not resolve; the substituted result is not echoed, since
            // it now holds the caller's parameter values, record ids among them.
            throw new SdkUsageError(
                "{$template} -> malformed placeholder: a brace in the template is not part of "
                . 'a {name} placeholder, so it was left as written and would be sent as a '
                . 'literal - fix the template'
            );
        }
        return $substituted . $queryAndFragment;
    }

    public static function buildUrl(string $baseUrl, string $path): string
    {
        self::rejectRedactedValue($path);
        // Before the absolute/relative split, so neither branch can be the one that lets a
        // fragment through.
        self::rejectFragment('path', $path);
        $lower = strtolower($path);
        foreach (self::ABSOLUTE_PREFIXES as $prefix) {
            if (str_starts_with($lower, $prefix)) {
                self::requireSameOrigin($baseUrl, $path);
                return $path;
            }
        }
        return rtrim($baseUrl, '/') . (str_starts_with($path, '/') ? '' : '/') . $path;
    }

    private static function rejectRedactedValue(string $path): void
    {
        $pattern = '#[?\#&]([^?\#&=]*)=' . preg_quote(Redaction::REDACTED, '#') . '(?=[&\#]|$)#';
        if (preg_match($pattern, $path, $m) === 1) {
            throw new SdkUsageError(
                "path: parameter '{$m[1]}' holds only the redaction marker '" . Redaction::REDACTED
                . "', so this URL is a printed or logged copy and the real value is not in it - "
                . 'read Location off the response itself, or call again with raise_on_error off'
            );
        }
    }

    /** A refusal here names an **origin** and never a resolved path. */
    private static function requireSameOrigin(string $baseUrl, string $url): void
    {
        $parts = parse_url($url);
        if ($parts === false) {
            throw new SdkUsageError('path: an absolute URL was passed that is not a usable URL');
        }
        if (isset($parts['user']) || isset($parts['pass'])) {
            $host = $parts['host'] ?? '';
            throw new SdkUsageError(
                "absolute URL for host {$host} carries embedded credentials, which would "
                . 'replace the bearer token; strip the userinfo before following it'
            );
        }
        if (self::splitOrigin($url) !== self::splitOrigin($baseUrl)) {
            throw new SdkUsageError(
                'absolute URL for origin ' . self::renderOrigin($url) . ' is not on the configured '
                . 'origin ' . self::renderOrigin($baseUrl) . '; an absolute URL is requested with '
                . "the access token attached, so only the application's own links may be passed back"
            );
        }
    }

    /** scheme://host[:port], and no more of the URL than that. */
    private static function renderOrigin(string $url): string
    {
        [$scheme, $host, $port] = self::splitOrigin($url);
        $implied = self::IMPLIED_PORTS[$scheme] ?? 0;
        return $scheme . '://' . $host . ($port === $implied ? '' : ':' . $port);
    }

    /** @return array{string,string,int} */
    private static function splitOrigin(string $url): array
    {
        $parts = parse_url($url);
        if ($parts === false) {
            throw new SdkUsageError('url: unusable URL - the origin could not be read from it');
        }
        $scheme = strtolower($parts['scheme'] ?? '');
        $host = strtolower($parts['host'] ?? '');
        $port = $parts['port'] ?? (self::IMPLIED_PORTS[$scheme] ?? 0);
        return [$scheme, $host, $port];
    }

    /** @return array{string,string} */
    private static function splitTemplate(string $template): array
    {
        if (preg_match('/[?\#]/', $template, $m, PREG_OFFSET_CAPTURE) === 1) {
            $at = $m[0][1];
            return [substr($template, 0, $at), substr($template, $at)];
        }
        return [$template, ''];
    }

    private static function paramText(mixed $value): string
    {
        return is_string($value) ? trim($value) : (string) $value;
    }

    /** Whether a path-param value is nothing but dots once whitespace is trimmed. */
    private static function isDotOnly(string $text): bool
    {
        $trimmed = trim($text);
        return $trimmed !== '' && trim($trimmed, '.') === '';
    }

    private static function isBlank(mixed $value): bool
    {
        return $value === null || (is_string($value) && trim($value) === '');
    }

    private static function isUsable(mixed $value): bool
    {
        return is_string($value) || is_int($value);
    }
}
