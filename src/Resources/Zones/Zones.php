<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Zones;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\Zones\ZonesDto\SettingsZone;
use Exsited\Sdk\Resources\Zones\ZonesDto\SettingsZoneList;

/** Zone endpoints, under `/api/{api_version}/settings/zones`. */
final class Zones
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List zones - `GET /settings/zones`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsZones(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ZonesUrls::SETTINGS_ZONES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsZoneList::class);
    }

    /** Create a zone - `POST /settings/zones`; `country_list` takes country ids, one at least.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsZone(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ZonesUrls::SETTINGS_ZONES, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsZone::class);
    }

    /** Get one zone - `GET /settings/zones/{zone_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsZone(ExsitedClient $client, int|string $zoneId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ZonesUrls::SETTINGS_ZONE, pathParams: ['zone_id' => $zoneId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsZone::class);
    }

    /** Delete a zone - `DELETE /settings/zones/{zone_id}`. */
    public static function deleteSettingsZone(ExsitedClient $client, int|string $zoneId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(ZonesUrls::SETTINGS_ZONE, pathParams: ['zone_id' => $zoneId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update a zone - `PATCH /settings/zones/{zone_id}`; answers 200 and changes
     *  nothing.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsZone(ExsitedClient $client, int|string $zoneId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(ZonesUrls::SETTINGS_ZONE, pathParams: ['zone_id' => $zoneId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsZone::class);
    }

    private static function requirePayload(array|string|Dto $payload): void
    {
        if ($payload === [] || (is_string($payload) && trim($payload) === '')) {
            throw new SdkUsageError(
                'payload is required: this endpoint takes a body, and an empty one '
                . 'sends the request with nothing in it'
            );
        }
    }
}
