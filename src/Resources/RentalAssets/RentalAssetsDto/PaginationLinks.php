<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\RentalAssets\RentalAssetsDto;

use Exsited\Sdk\Client\Dto;

/** The `links` object of Pagination. */
final class PaginationLinks extends Dto
{
    public function __construct(
        public readonly mixed $next = null,
        public readonly mixed $prev = null,
    ) {
    }
}
