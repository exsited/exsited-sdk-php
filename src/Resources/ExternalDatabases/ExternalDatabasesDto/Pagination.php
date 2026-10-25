<?php

declare(strict_types=1);

namespace Exsited\Resources\ExternalDatabases\ExternalDatabasesDto;

use Exsited\Client\Dto;

/** The `pagination` block a listing answers with. */
final class Pagination extends Dto
{
    public function __construct(
        public readonly ?bool $hasNext = null,
        public readonly ?bool $hasPrev = null,
        public readonly ?PaginationLinks $links = null,
        public readonly mixed $nextCursor = null,
        public readonly ?int $perPage = null,
        public readonly mixed $prevCursor = null,
    ) {
    }
}
