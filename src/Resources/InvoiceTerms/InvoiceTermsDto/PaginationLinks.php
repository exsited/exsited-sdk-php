<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\InvoiceTerms\InvoiceTermsDto;

use Exsited\Sdk\Client\Dto;

/** A `Pagination`'s `links`. */
final class PaginationLinks extends Dto
{
    public function __construct(
        public readonly ?string $next = null,
        public readonly ?string $prev = null,
    ) {
    }
}
