<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ChargingPeriods;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\ChargingPeriods\ChargingPeriodsDto\SettingsChargingPeriod;
use Exsited\Sdk\Resources\ChargingPeriods\ChargingPeriodsDto\SettingsChargingPeriodList;

/** Charging period endpoints, under `/api/{api_version}/settings/charging_periods`. */
final class ChargingPeriods
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List the charging periods - `GET /settings/charging_periods`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsChargingPeriods(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ChargingPeriodsUrls::SETTINGS_CHARGING_PERIODS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsChargingPeriodList::class);
    }

    /** Create a charging period; `name`, `display_name` and `time_period`, a `tp_` id, are
     *  required - `POST /settings/charging_periods`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsChargingPeriod(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ChargingPeriodsUrls::SETTINGS_CHARGING_PERIODS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsChargingPeriod::class);
    }

    /** Read one charging period by its `cp_` id - `GET
     *  /settings/charging_periods/{charging_period_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsChargingPeriod(ExsitedClient $client, int|string $chargingPeriodId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ChargingPeriodsUrls::SETTINGS_CHARGING_PERIOD, pathParams: ['charging_period_id' => $chargingPeriodId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsChargingPeriod::class);
    }

    /** Delete a charging period - `DELETE /settings/charging_periods/{charging_period_id}`. */
    public static function deleteSettingsChargingPeriod(ExsitedClient $client, int|string $chargingPeriodId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(ChargingPeriodsUrls::SETTINGS_CHARGING_PERIOD, pathParams: ['charging_period_id' => $chargingPeriodId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update a charging period's fields or its status - `PATCH
     *  /settings/charging_periods/{charging_period_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsChargingPeriod(ExsitedClient $client, int|string $chargingPeriodId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(ChargingPeriodsUrls::SETTINGS_CHARGING_PERIOD, pathParams: ['charging_period_id' => $chargingPeriodId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsChargingPeriod::class);
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
