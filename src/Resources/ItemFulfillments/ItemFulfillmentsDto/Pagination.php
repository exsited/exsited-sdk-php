<?php

declare(strict_types=1);

namespace Exsited\Resources\ItemFulfillments\ItemFulfillmentsDto;

use Exsited\Client\Dto;

/** The `pagination` block a listing answers with. */
final class Pagination extends Dto
{
    public function __construct(
        public readonly ?bool $hasMore = null,
        public readonly ?int $limit = null,
        public readonly ?PaginationLinks $links = null,
        public readonly ?string $nextCursor = null,
        public readonly mixed $prevCursor = null,
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
