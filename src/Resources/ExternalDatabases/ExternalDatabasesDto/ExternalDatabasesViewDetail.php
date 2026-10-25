<?php

declare(strict_types=1);

namespace Exsited\Resources\ExternalDatabases\ExternalDatabasesDto;

use Exsited\Client\Dto;

/** The `external_database` object of ExternalDatabasesView. */
final class ExternalDatabasesViewDetail extends Dto
{
    public function __construct(
        public readonly ?array $activityLogs = null,
        public readonly ?string $message = null,
        public readonly ?string $name = null,
    ) {
    }
}
