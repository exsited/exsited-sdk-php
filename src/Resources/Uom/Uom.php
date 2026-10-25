<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Uom;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\Uom\UomDto\SettingsUom;
use Exsited\Sdk\Resources\Uom\UomDto\SettingsUomList;

/** Unit of measurement endpoints, under `/api/{api_version}/settings/uom`. */
final class Uom
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List units of measurement - `GET /settings/uom`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsUoms(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(UomUrls::SETTINGS_UOMS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsUomList::class);
    }

    /** Create a unit of measurement - `POST /settings/uom`; answers 400
     *  validation_error, naming no field, even for a valid body.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsUom(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(UomUrls::SETTINGS_UOMS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Get one unit of measurement - `GET /settings/uom/{uom_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsUom(ExsitedClient $client, int|string $uomId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(UomUrls::SETTINGS_UOM, pathParams: ['uom_id' => $uomId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsUom::class);
    }

    /** Delete a unit of measurement - `DELETE /settings/uom/{uom_id}`. */
    public static function deleteSettingsUom(ExsitedClient $client, int|string $uomId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(UomUrls::SETTINGS_UOM, pathParams: ['uom_id' => $uomId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update or enable/disable a unit of measurement - `PATCH /settings/uom/{uom_id}`; `status`
     *  takes active or inactive.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsUom(ExsitedClient $client, int|string $uomId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(UomUrls::SETTINGS_UOM, pathParams: ['uom_id' => $uomId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
