<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Applications;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\Applications\ApplicationsDto\SettingsApplication;
use Exsited\Sdk\Resources\Applications\ApplicationsDto\SettingsApplicationList;

/** Application endpoints, under `/api/{api_version}/settings/applications`. */
final class Applications
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List the OAuth applications - `GET /settings/applications`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsApplications(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ApplicationsUrls::SETTINGS_APPLICATIONS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsApplicationList::class);
    }

    /** Create an OAuth application; `name` and `redirect_url` are required, and the client id and
     *  secret are generated server side and never answered - `POST /settings/applications`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsApplication(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ApplicationsUrls::SETTINGS_APPLICATIONS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsApplication::class);
    }

    /** Read one OAuth application by its `app_` id - `GET
     *  /settings/applications/{application_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsApplication(ExsitedClient $client, int|string $applicationId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ApplicationsUrls::SETTINGS_APPLICATION, pathParams: ['application_id' => $applicationId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsApplication::class);
    }

    /** Delete an OAuth application - `DELETE /settings/applications/{application_id}`. */
    public static function deleteSettingsApplication(ExsitedClient $client, int|string $applicationId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(ApplicationsUrls::SETTINGS_APPLICATION, pathParams: ['application_id' => $applicationId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update an OAuth application's fields or its status - `PATCH
     *  /settings/applications/{application_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsApplication(ExsitedClient $client, int|string $applicationId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(ApplicationsUrls::SETTINGS_APPLICATION, pathParams: ['application_id' => $applicationId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsApplication::class);
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
