<?php

declare(strict_types=1);

namespace Exsited\Sdk\Client;

use Exsited\Sdk\Errors\SdkError;
use Exsited\Sdk\Errors\SdkUsageError;

/** Lazy walks over a v4 listing. The paging shape (cursor or offset) is read off each page, the
 *  offset is computed rather than taken from `next_page` (which can name another path or the string
 *  "NULL"), and both walks refuse a cursor or offset that did not advance. */
final class Pagination
{
    /** The key the cursor shape puts its records under. */
    public const DEFAULT_RECORD_KEY = 'data';

    private const PAGINATION_KEY = 'pagination';

    /** What the offset shape writes in `next_page` at the end: a string, so it is compared. */
    public const NO_NEXT_PAGE = 'NULL';

    /** One ApiResponse per page, whichever shape each page uses.
     *  @param array<string,mixed>|null $pathParams @param array<string,mixed>|null $queryParams
     *  @return \Generator<int,ApiResponse> */
    public static function iterPages(
        object $client,
        string $path,
        string $recordKey = self::DEFAULT_RECORD_KEY,
        ?array $pathParams = null,
        ?array $queryParams = null,
        ?int $maxPages = null,
        bool $raiseOnError = true,
    ): \Generator {
        if ($maxPages !== null && $maxPages < 1) {
            throw new SdkUsageError(
                "maxPages: expected a positive integer or null, got {$maxPages}"
            );
        }

        $parameters = $queryParams ?? [];
        // The walk owns these two; a caller's value would fight the pager for the key.
        foreach (['cursor', 'offset'] as $reserved) {
            if (array_key_exists($reserved, $parameters)) {
                throw new SdkUsageError(
                    "queryParams: {$reserved} is set by the pager and must not be passed in; "
                    . 'start the walk where you want it by calling the endpoint directly'
                );
            }
        }

        $seenCursors = [];
        $lastOffset = null;
        $pagesYielded = 0;

        while (true) {
            $response = $client->sendGetRequest(
                $path,
                pathParams: $pathParams,
                queryParams: $parameters === [] ? null : $parameters,
                raiseOnError: $raiseOnError,
            );
            yield $response;
            $pagesYielded++;

            if (!$response->succeeded()) {
                return;
            }
            if ($maxPages !== null && $pagesYielded >= $maxPages) {
                return;
            }

            // `map`, never `data`: paging works the same whatever responseFormat is set.
            $body = $response->map;
            $block = is_array($body) && isset($body[self::PAGINATION_KEY])
                && is_array($body[self::PAGINATION_KEY])
                ? $body[self::PAGINATION_KEY]
                : null;
            if ($block === null) {
                return;
            }

            // The shape is read off this page, not decided once for the walk.
            $cursor = self::readNextCursor($block);
            if ($cursor !== null) {
                if (isset($seenCursors[$cursor])) {
                    throw new SdkError(
                        'pagination loop: the API handed back a cursor it had already given, '
                        . 'so following it again would never terminate; the pages already '
                        . 'yielded are good'
                    );
                }
                $seenCursors[$cursor] = true;
                $parameters['cursor'] = $cursor;
                continue;
            }

            $offset = self::readNextOffset($block, self::countRecords($body, $recordKey));
            if ($offset === null) {
                return;
            }
            if ($lastOffset !== null && $offset <= $lastOffset) {
                throw new SdkError(
                    "pagination loop: the next offset ({$offset}) did not advance past the "
                    . "last ({$lastOffset}), so the walk would repeat a page forever; the "
                    . 'pages already yielded are good'
                );
            }
            $lastOffset = $offset;
            $parameters['offset'] = $offset;
        }
    }

    /** One record per iteration, flattened across pages.
     *  @param array<string,mixed>|null $pathParams @param array<string,mixed>|null $queryParams
     *  @return \Generator<int,mixed> */
    public static function iterRecords(
        object $client,
        string $path,
        string $recordKey = self::DEFAULT_RECORD_KEY,
        ?array $pathParams = null,
        ?array $queryParams = null,
        ?int $maxPages = null,
        bool $raiseOnError = true,
    ): \Generator {
        foreach (self::iterPages($client, $path, $recordKey, $pathParams, $queryParams, $maxPages, $raiseOnError) as $response) {
            // A failed page raises whatever raiseOnError says, or a partial walk reads as a whole one.
            if (!$response->succeeded()) {
                $response->raiseForStatus();
            }
            $body = $response->map;
            if (!is_array($body) || !isset($body[$recordKey]) || !is_array($body[$recordKey])) {
                continue;
            }
            foreach ($body[$recordKey] as $record) {
                yield $record;
            }
        }
    }

    /** The next cursor, or null at the end or where this page is not the cursor shape; `has_more:
     *  false` wins, and a blank cursor is the end rather than a restart.
     *  @param array<string,mixed> $block */
    private static function readNextCursor(array $block): ?string
    {
        if (array_key_exists('has_more', $block) && $block['has_more'] === false) {
            return null;
        }
        $cursor = $block['next_cursor'] ?? null;
        if (!is_string($cursor) || trim($cursor) === '') {
            return null;
        }
        return $cursor;
    }

    /** The next offset, computed from this page, or null at the end of the listing.
     *  @param array<string,mixed> $block */
    private static function readNextOffset(array $block, int $returned): ?int
    {
        $nextPage = $block['next_page'] ?? null;
        if ($nextPage === null || (is_string($nextPage) && strcasecmp($nextPage, self::NO_NEXT_PAGE) === 0)) {
            return null;
        }
        if ($returned === 0) {
            return null;
        }
        $current = self::readNumber($block, 'offset') ?? 0;
        $limit = self::readNumber($block, 'limit');
        // The page's own size when it reports one, otherwise what it returned.
        $step = $limit !== null && $limit > 0 ? $limit : $returned;
        return $current + $step;
    }

    /** `"offset": "20"` and `"offset": 20` both occur in v4, so both are read.
     *  @param array<string,mixed> $block */
    private static function readNumber(array $block, string $key): ?int
    {
        $value = $block[$key] ?? null;
        if (is_int($value)) {
            return $value;
        }
        if (is_string($value) && $value !== '' && ctype_digit(ltrim($value, '-'))) {
            return (int) $value;
        }
        return null;
    }

    private static function countRecords(mixed $body, string $recordKey): int
    {
        if (is_array($body) && isset($body[$recordKey]) && is_array($body[$recordKey])) {
            return count($body[$recordKey]);
        }
        return 0;
    }
}
