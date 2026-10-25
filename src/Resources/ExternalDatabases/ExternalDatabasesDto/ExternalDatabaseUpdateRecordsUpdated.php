<?php

declare(strict_types=1);

namespace Exsited\Resources\ExternalDatabases\ExternalDatabasesDto;

use Exsited\Client\Dto;

/** The ExternalDatabaseUpdateRecordsUpdated body, as measured from the endpoints in MEASURED_FROM. */
final class ExternalDatabaseUpdateRecordsUpdated extends Dto
{
    public const ENVELOPE_KEY = 'external_database';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'PATCH /api/{api_version}/external_databases/{db_name}/update_records',
    ];

    public function __construct(
        public readonly ?string $message = null,
    ) {
    }
}
