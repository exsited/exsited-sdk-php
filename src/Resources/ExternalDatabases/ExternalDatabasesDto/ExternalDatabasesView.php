<?php

declare(strict_types=1);

namespace Exsited\Resources\ExternalDatabases\ExternalDatabasesDto;

use Exsited\Client\Dto;

/** The ExternalDatabasesView body, as measured from the endpoints in MEASURED_FROM. */
final class ExternalDatabasesView extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/external_databases',
        'POST /api/{api_version}/external_databases',
        'GET /api/{api_version}/external_databases/{db_name}',
        'GET /api/{api_version}/external_databases/{db_name}/tables/{table_name}',
    ];

    public function __construct(
        public readonly ?array $data = null,
        public readonly ?ExternalDatabasesViewDetail $externalDatabase = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
