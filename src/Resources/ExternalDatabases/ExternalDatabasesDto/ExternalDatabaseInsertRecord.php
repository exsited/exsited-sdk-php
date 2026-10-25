<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ExternalDatabases\ExternalDatabasesDto;

use Exsited\Sdk\Client\Dto;

/** The ExternalDatabaseInsertRecord body, as measured from the endpoints in MEASURED_FROM. */
final class ExternalDatabaseInsertRecord extends Dto
{
    public const ENVELOPE_KEY = 'external_database';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/external_databases/{db_name}/insert_records',
    ];

    public function __construct(
        public readonly mixed $insertedData = null,
        public readonly ?string $message = null,
        public readonly ?bool $success = null,
    ) {
    }
}
