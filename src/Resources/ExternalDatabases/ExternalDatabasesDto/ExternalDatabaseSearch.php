<?php

declare(strict_types=1);

namespace Exsited\Resources\ExternalDatabases\ExternalDatabasesDto;

use Exsited\Client\Dto;

/** The ExternalDatabaseSearch body, as measured from the endpoints in MEASURED_FROM. */
final class ExternalDatabaseSearch extends Dto
{
    public const ENVELOPE_KEY = 'external_database';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/external_databases/{db_name}/search',
    ];

    public function __construct(
        public readonly ?int $count = null,
        public readonly ?int $limit = null,
        public readonly mixed $list = null,
        public readonly ?int $offset = null,
        public readonly ?bool $success = null,
    ) {
    }
}
