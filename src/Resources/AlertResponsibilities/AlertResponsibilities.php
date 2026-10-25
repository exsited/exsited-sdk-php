<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\AlertResponsibilities;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;

/** Alert responsibility endpoints, under `/api/{api_version}/settings/alert_responsibilities`. */
final class AlertResponsibilities
{
    /** List the alert responsibilities - `GET /settings/alert_responsibilities`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsAlertResponsibilities(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AlertResponsibilitiesUrls::SETTINGS_ALERT_RESPONSIBILITIES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Create an alert responsibility; `name` is required - `POST
     *  /settings/alert_responsibilities`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsAlertResponsibility(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(AlertResponsibilitiesUrls::SETTINGS_ALERT_RESPONSIBILITIES, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Read one alert responsibility by its `ar_` id - `GET
     *  /settings/alert_responsibilities/{alert_responsibility_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsAlertResponsibility(ExsitedClient $client, int|string $alertResponsibilityId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AlertResponsibilitiesUrls::SETTINGS_ALERT_RESPONSIBILITY, pathParams: ['alert_responsibility_id' => $alertResponsibilityId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Delete an alert responsibility - `DELETE
     *  /settings/alert_responsibilities/{alert_responsibility_id}`. */
    public static function deleteSettingsAlertResponsibility(ExsitedClient $client, int|string $alertResponsibilityId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(AlertResponsibilitiesUrls::SETTINGS_ALERT_RESPONSIBILITY, pathParams: ['alert_responsibility_id' => $alertResponsibilityId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update an alert responsibility's fields or its status - `PATCH
     *  /settings/alert_responsibilities/{alert_responsibility_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsAlertResponsibility(ExsitedClient $client, int|string $alertResponsibilityId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(AlertResponsibilitiesUrls::SETTINGS_ALERT_RESPONSIBILITY, pathParams: ['alert_responsibility_id' => $alertResponsibilityId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
