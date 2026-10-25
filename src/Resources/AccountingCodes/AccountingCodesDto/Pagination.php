<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\AccountingCodes\AccountingCodesDto;

use Exsited\Sdk\Client\Dto;

/** The `pagination` block a listing answers with. */
final class Pagination extends Dto
{
    public function __construct(
        public readonly ?bool $hasMore = null,
        public readonly ?int $limit = null,
        public readonly ?PaginationLinks $links = null,
        public readonly mixed $nextCursor = null,
        public readonly mixed $prevCursor = null,
    ) {
    }
}
