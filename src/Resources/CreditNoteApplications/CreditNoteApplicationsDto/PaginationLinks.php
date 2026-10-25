<?php

declare(strict_types=1);

namespace Exsited\Resources\CreditNoteApplications\CreditNoteApplicationsDto;

use Exsited\Client\Dto;

/** The `links` object of Pagination. */
final class PaginationLinks extends Dto
{
    public function __construct(
        public readonly mixed $next = null,
        public readonly mixed $prev = null,
    ) {
    }
}
