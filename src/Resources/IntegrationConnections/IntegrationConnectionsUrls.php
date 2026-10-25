<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\IntegrationConnections;

final class IntegrationConnectionsUrls
{
    public const INTEGRATION_CONNECTIONS = '/api/{api_version}/integration_connections';
    public const INTEGRATION_CONNECTION = '/api/{api_version}/integration_connections/{integration_connection_id}';

    /** The key the `INTEGRATION_CONNECTIONS` listing's records sit under. */
    public const INTEGRATION_CONNECTIONS_KEY = 'data';
}
