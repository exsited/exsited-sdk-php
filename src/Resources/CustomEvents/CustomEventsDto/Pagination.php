<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomEvents\CustomEventsDto;

use Exsited\Sdk\Client\Dto;

/** A list envelope's `pagination` block. One response fills only one shape: cursor (`has_more`
 *  present), offset (`records` present) or the external database listings' (`has_next` present),
 *  and the others read null. */
final class Pagination extends Dto
{
    public function __construct(
        /** The page size the API applied; the one field both shapes carry. */
        public readonly ?int $limit = null,
        /** Authoritative over `next_cursor`, which can be stale on the last page. */
        public readonly ?bool $hasMore = null,
        public readonly ?string $nextCursor = null,
        public readonly ?string $prevCursor = null,
        public readonly ?PaginationLinks $links = null,
        /** Total matching records, not the page's length. */
        public readonly ?int $records = null,
        public readonly ?int $offset = null,
        /** The literal string `"NULL"` at the end of a listing, not `null`, so never truth-test
         *  it; a real link can point at another path, so the pager never follows one. */
        public readonly ?string $nextPage = null,
        /** The empty string, never a URL: the offset shape has no backward paging. */
        public readonly ?string $previousPage = null,
        /** The external database listings page with these three instead. */
        public readonly ?bool $hasNext = null,
        public readonly ?bool $hasPrev = null,
        public readonly ?int $perPage = null,
    ) {
    }
}
