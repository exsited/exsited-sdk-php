<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\IntegrationConnections;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Resources\IntegrationConnections\IntegrationConnectionsDto\IntegrationConnectionsView;

/** Integration connection endpoints, under `/api/{api_version}/integration_connections`. */
final class IntegrationConnections
{
    /** List connections - `GET /integration_connections`; filter by status with `filter_status`
     *  (`QueryParams::filterParam('status')`): ACTIVE, INACTIVE or DISCONNECTED.
     *  @param array<string,mixed>|null $queryParams */
    public static function getIntegrationConnections(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(IntegrationConnectionsUrls::INTEGRATION_CONNECTIONS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: IntegrationConnectionsView::class);
    }

    /** Get single - `GET /integration_connections/{integration_connection_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getIntegrationConnection(ExsitedClient $client, int|string $integrationConnectionId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(IntegrationConnectionsUrls::INTEGRATION_CONNECTION, pathParams: ['integration_connection_id' => $integrationConnectionId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }
}
