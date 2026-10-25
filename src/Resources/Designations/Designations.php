<?php

declare(strict_types=1);

namespace Exsited\Resources\Designations;

use Exsited\Client\ApiResponse;
use Exsited\Client\Dto;
use Exsited\Client\ExsitedClient;
use Exsited\Errors\SdkUsageError;
use Exsited\Resources\Designations\DesignationsDto\SettingsDesignation;
use Exsited\Resources\Designations\DesignationsDto\SettingsDesignationList;

/** Designation endpoints, under `/api/{api_version}/settings/designations`. */
final class Designations
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List the designations - `GET /settings/designations`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsDesignations(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(DesignationsUrls::SETTINGS_DESIGNATIONS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsDesignationList::class);
    }

    /** Create a designation; `name` is required - `POST /settings/designations`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsDesignation(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(DesignationsUrls::SETTINGS_DESIGNATIONS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Read one designation by its `des_` id - `GET /settings/designations/{designation_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsDesignation(ExsitedClient $client, int|string $designationId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(DesignationsUrls::SETTINGS_DESIGNATION, pathParams: ['designation_id' => $designationId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsDesignation::class);
    }

    /** Delete a designation - `DELETE /settings/designations/{designation_id}`. */
    public static function deleteSettingsDesignation(ExsitedClient $client, int|string $designationId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(DesignationsUrls::SETTINGS_DESIGNATION, pathParams: ['designation_id' => $designationId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update a designation's name, display name or description - `PATCH
     *  /settings/designations/{designation_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsDesignation(ExsitedClient $client, int|string $designationId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(DesignationsUrls::SETTINGS_DESIGNATION, pathParams: ['designation_id' => $designationId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
