<?php

declare(strict_types=1);

namespace Exsited\Resources\ItemReceipts\ItemReceiptsDto;

use Exsited\Client\Dto;

/** The `links` object of Pagination. */
final class PaginationLinks extends Dto
{
    public function __construct(
        public readonly ?string $next = null,
        public readonly ?string $prev = null,
    ) {
    }
}
