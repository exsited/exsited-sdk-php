<?php

declare(strict_types=1);

namespace Exsited\Http;

use Exsited\Errors\SdkUsageError;
use Exsited\Redaction;

/** Query values normalised, never names: v4 names are snake_case throughout. The filter and sort
 *  helpers below spell the v4 grammar. */
final class QueryParams
{
    /** The v4 filter comparisons, as the suffix after the field name; `eq` is no suffix at all.
     *  The union of the per-type lists the API accepts. */
    public const FILTER_OPERATORS = [
        'eq', 'neq', 'in', 'nin', 'contains', 'not_contains', 'starts_with',
        'gt', 'gte', 'lt', 'lte', 'has_value', 'does_not_have_value',
    ];

    /** Presence checks: the value is not read, and a null would drop the filter entirely. */
    public const PRESENCE_OPERATORS = ['has_value', 'does_not_have_value'];

    /** Comparisons that take a comma-separated list; build the value with {@see filterValues()}. */
    public const LIST_OPERATORS = ['in', 'nin'];

    private const FILTER_PREFIX = 'filter';

    /** `filter_<field>` for `eq`, `filter_<field>_<operator>` otherwise; an unknown operator is
     *  refused rather than becoming part of the field name. */
    public static function filterParam(string $field, string $operator = 'eq'): string
    {
        if (trim($field) === '') {
            throw new SdkUsageError(
                "filter field: expected a field name like 'status', got an empty string"
            );
        }
        if (!in_array($operator, self::FILTER_OPERATORS, true)) {
            throw new SdkUsageError(
                "filter operator '{$operator}': expected one of "
                . implode(', ', self::FILTER_OPERATORS)
            );
        }
        $stem = self::FILTER_PREFIX . '_' . trim($field);
        return $operator === 'eq' ? $stem : $stem . '_' . $operator;
    }

    /** One comma-separated value for `in` or `nin`; a member carrying a comma is refused, since the
     *  API would read it as two.
     *  @param iterable<mixed> $values */
    public static function filterValues(iterable $values): string
    {
        $rendered = [];
        foreach ($values as $value) {
            if ($value === null) {
                throw new SdkUsageError(
                    'filter values: a member is null, which has no value to match; drop '
                    . "it, or use the 'does_not_have_value' operator if what was meant "
                    . "is 'this field is unset'"
                );
            }
            if (is_array($value) || $value instanceof \Traversable) {
                throw new SdkUsageError(
                    'filter values: a member is itself a sequence; this builds one comma '
                    . 'separated value, so flatten it to a list of scalars'
                );
            }
            $text = self::normalizeValue($value, 'filter values', 1);
            $text = is_string($text) ? $text : (string) $text;
            if (str_contains($text, ',')) {
                throw new SdkUsageError(
                    "filter values: the member '{$text}' contains a comma, which the API "
                    . 'reads as the separator between two values, so it would match '
                    . 'something other than what was asked for'
                );
            }
            $rendered[] = $text;
        }

        if ($rendered === []) {
            throw new SdkUsageError(
                'filter values: expected at least one value; an empty \'in\' filter is '
                . "sent as 'filter_<field>_in=' and answered 200 with no rows, which "
                . 'reads as \'nothing matched\' rather than as the mistake it is'
            );
        }
        return implode(',', $rendered);
    }

    /** The `sort` spelling, `-` prefixed for descending; the wrong spelling for a family is ignored
     *  by the API, not refused. */
    public static function sortParam(string $field, SortDirection $direction = SortDirection::Asc): string
    {
        if (trim($field) === '') {
            throw new SdkUsageError(
                "sort field: expected a field name like 'created_on', got an empty string"
            );
        }
        $field = trim($field);
        return $direction === SortDirection::Desc ? '-' . $field : $field;
    }

    /** The `order_by` and `direction` spelling.
     *  @return array{order_by:string,direction:string} */
    public static function sortParams(string $field, bool $descending = false): array
    {
        if (trim($field) === '') {
            throw new SdkUsageError(
                "sort field: expected a field name like 'created_on', got an empty string"
            );
        }
        return [
            'order_by' => trim($field),
            'direction' => $descending ? 'desc' : 'asc',
        ];
    }

    /** @param array<string,mixed>|null $params
     *  @return array<string,mixed> */
    public static function build(?array $params): array
    {
        if ($params === null) {
            return [];
        }
        $normalised = [];
        foreach ($params as $key => $value) {
            if ($value === null) {
                continue;
            }
            $normalised[$key] = self::normalizeValue($value, (string) $key, 0);
        }
        return $normalised;
    }

    private static function normalizeValue(mixed $value, string $key, int $depth): mixed
    {
        if ($depth >= Redaction::MAX_DEPTH) {
            throw new SdkUsageError(
                "query param '{$key}': nested more than " . Redaction::MAX_DEPTH
                . ' levels deep, which is too deep to encode in a query string'
            );
        }
        if (is_array($value) && !array_is_list($value)) {
            throw new SdkUsageError(
                "query param '{$key}': nested objects cannot be encoded in a query string; "
                . 'flatten it or send it in the body'
            );
        }
        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }
        if ($value instanceof \BackedEnum) {
            return self::normalizeValue($value->value, $key, $depth);
        }
        if ($value instanceof \DateTimeInterface) {
            return self::isoTime($value);
        }
        if (is_array($value) || $value instanceof \Traversable) {
            if ($depth >= 1) {
                // The keyed-array check above runs first, so a map inside a list reports as a
                // map; what is left is a list inside a list, which a query string cannot encode.
                throw new SdkUsageError(
                    "query param '{$key}': a sequence inside a sequence has no query-string "
                    . 'encoding; flatten it to one list of scalars'
                );
            }
            $items = is_array($value) ? $value : iterator_to_array($value, false);
            $out = [];
            foreach ($items as $entry) {
                if ($entry === null) {
                    continue;
                }
                $out[] = self::normalizeValue($entry, $key, $depth + 1);
            }
            return $out;
        }
        // Refused here, before any I/O: an object left in place would reach a `(string)` cast after
        // the token grant, spending a live authentication or sending an unvalidated `__toString()`.
        if (is_object($value) || is_resource($value)) {
            throw new SdkUsageError(
                "query param '{$key}': " . get_debug_type($value) . ' has no query-string form; '
                . 'pass a scalar, a DateTimeInterface, a BackedEnum, or a list of those'
            );
        }
        return $value;
    }

    /** An ISO 8601 instant that keeps the sub-second precision it was given. */
    private static function isoTime(\DateTimeInterface $value): string
    {
        return $value->format(((int) $value->format('u')) === 0 ? 'Y-m-d\TH:i:sP' : 'Y-m-d\TH:i:s.uP');
    }
}
