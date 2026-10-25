<?php

declare(strict_types=1);

namespace Exsited\Resources\TimePeriods;

use Exsited\Client\ApiResponse;
use Exsited\Client\Dto;
use Exsited\Client\ExsitedClient;
use Exsited\Errors\SdkUsageError;
use Exsited\Resources\TimePeriods\TimePeriodsDto\SettingsTimePeriod;
use Exsited\Resources\TimePeriods\TimePeriodsDto\SettingsTimePeriodList;

/** Time period endpoints, under `/api/{api_version}/settings/time_periods`. */
final class TimePeriods
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List time periods - `GET /settings/time_periods`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsTimePeriods(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(TimePeriodsUrls::SETTINGS_TIME_PERIODS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsTimePeriodList::class);
    }

    /** Create a time period - `POST /settings/time_periods`; `period` is sent upper case and
     *  answered lower case.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsTimePeriod(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(TimePeriodsUrls::SETTINGS_TIME_PERIODS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsTimePeriod::class);
    }

    /** Get one time period - `GET /settings/time_periods/{time_period_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsTimePeriod(ExsitedClient $client, int|string $timePeriodId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(TimePeriodsUrls::SETTINGS_TIME_PERIOD, pathParams: ['time_period_id' => $timePeriodId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsTimePeriod::class);
    }

    /** Delete a time period - `DELETE /settings/time_periods/{time_period_id}`. */
    public static function deleteSettingsTimePeriod(ExsitedClient $client, int|string $timePeriodId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(TimePeriodsUrls::SETTINGS_TIME_PERIOD, pathParams: ['time_period_id' => $timePeriodId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update or enable/disable a time period - `PATCH /settings/time_periods/{time_period_id}`;
     *  `status` takes active or inactive.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsTimePeriod(ExsitedClient $client, int|string $timePeriodId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(TimePeriodsUrls::SETTINGS_TIME_PERIOD, pathParams: ['time_period_id' => $timePeriodId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsTimePeriod::class);
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
