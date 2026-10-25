<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\AdditionalCodes;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\AdditionalCodes\AdditionalCodesDto\SettingsAdditionalCode;
use Exsited\Sdk\Resources\AdditionalCodes\AdditionalCodesDto\SettingsAdditionalCodeList;

/** Additional code endpoints, under `/api/{api_version}/settings/additional_codes`. */
final class AdditionalCodes
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List the additional codes, the data sets of purchase order lines - `GET
     *  /settings/additional_codes`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsAdditionalCodes(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AdditionalCodesUrls::SETTINGS_ADDITIONAL_CODES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsAdditionalCodeList::class);
    }

    /** Create an additional code; `name` is required - `POST /settings/additional_codes`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsAdditionalCode(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(AdditionalCodesUrls::SETTINGS_ADDITIONAL_CODES, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsAdditionalCode::class);
    }

    /** Read one additional code by its `ac_` id - `GET
     *  /settings/additional_codes/{additional_code_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsAdditionalCode(ExsitedClient $client, int|string $additionalCodeId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AdditionalCodesUrls::SETTINGS_ADDITIONAL_CODE, pathParams: ['additional_code_id' => $additionalCodeId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsAdditionalCode::class);
    }

    /** Delete an additional code - `DELETE /settings/additional_codes/{additional_code_id}`. */
    public static function deleteSettingsAdditionalCode(ExsitedClient $client, int|string $additionalCodeId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(AdditionalCodesUrls::SETTINGS_ADDITIONAL_CODE, pathParams: ['additional_code_id' => $additionalCodeId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update an additional code's fields or its status - `PATCH
     *  /settings/additional_codes/{additional_code_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsAdditionalCode(ExsitedClient $client, int|string $additionalCodeId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(AdditionalCodesUrls::SETTINGS_ADDITIONAL_CODE, pathParams: ['additional_code_id' => $additionalCodeId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
