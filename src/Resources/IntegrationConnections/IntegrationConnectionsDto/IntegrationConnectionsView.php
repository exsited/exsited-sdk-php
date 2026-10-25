<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\IntegrationConnections\IntegrationConnectionsDto;

use Exsited\Sdk\Client\Dto;

/** The IntegrationConnectionsView body, as measured from the endpoints in MEASURED_FROM. */
final class IntegrationConnectionsView extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/integration_connections',
    ];

    public function __construct(
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
