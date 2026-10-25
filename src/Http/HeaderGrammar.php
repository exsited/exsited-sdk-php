<?php

declare(strict_types=1);

namespace Exsited\Http;

/** A header refusal that names the offending byte, for a caller who wants more than
 *  {@see Transport::headerProblem()} says. The grammar is Transport's: this class only words it,
 *  and never prints the value. */
final class HeaderGrammar
{
    private const NAME_LIMIT = 80;

    /** Why this pair cannot be sent, or null when it can. */
    public static function refusalReason(string $name, #[\SensitiveParameter] string $value): ?string
    {
        $problem = Transport::headerProblem($name, $value);
        if ($problem === null) {
            return null;
        }
        if ($name === '') {
            return 'a header with an empty name cannot be sent';
        }
        if ($problem === 'name') {
            $at = self::firstByteOutside($name, '/^[!#$%&\'*+\-.^_`|~0-9A-Za-z]$/D');
            return 'header ' . self::renderName($name) . ': the name carries '
                . self::describe($name[$at ?? 0]) . ' at byte ' . ($at ?? 0) . ', and RFC 9110 allows '
                . 'only a token in a header name';
        }
        if (preg_match('/^[ \t]|[ \t]$/D', $value) === 1) {
            return 'header ' . self::renderName($name) . ': the value is padded with a space or a tab; '
                . 'trim it. The value is not shown: it may be a credential';
        }
        $at = self::firstByteOutside($value, '/^[\x20\x09\x21-\x7E]$/D');
        return 'header ' . self::renderName($name) . ': the value carries '
            . self::describe($value[$at ?? 0]) . ', which cannot be sent. The value is not shown: '
            . 'it may be a credential';
    }

    private static function firstByteOutside(string $text, string $bytePattern): ?int
    {
        $length = strlen($text);
        for ($i = 0; $i < $length; $i++) {
            if (preg_match($bytePattern, $text[$i]) !== 1) {
                return $i;
            }
        }
        return null;
    }

    /** One byte, said in words; safe to print, since no sendable value may contain it. */
    private static function describe(string $byte): string
    {
        $code = ord($byte);
        return match (true) {
            $byte === "\r" => 'a carriage return',
            $byte === "\n" => 'a newline',
            $byte === "\t" => 'a tab',
            $byte === ' ' => 'a space',
            $byte === ':' => 'a colon',
            $code < 0x20 || $code === 0x7F => 'the control byte ' . sprintf('\x%02x', $code),
            $code >= 0x80 => 'the non-ASCII byte ' . sprintf('\x%02x', $code),
            default => "the character '" . $byte . "'",
        };
    }

    /** Quoted, bounded, and with every byte a terminal might obey written as `\xNN`. */
    private static function renderName(string $name): string
    {
        $shown = strlen($name) > self::NAME_LIMIT ? substr($name, 0, self::NAME_LIMIT) . '...' : $name;
        return "'" . preg_replace_callback(
            '/[\x00-\x1F\x7F-\xFF]/',
            static fn (array $m): string => sprintf('\x%02x', ord($m[0])),
            $shown
        ) . "'";
    }
}
