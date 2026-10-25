<?php

declare(strict_types=1);

namespace Exsited\Resources\DayOfMonth;

use Exsited\Client\ApiResponse;
use Exsited\Client\ExsitedClient;
use Exsited\Resources\DayOfMonth\DayOfMonthDto\SettingsDayOfMonth;
use Exsited\Resources\DayOfMonth\DayOfMonthDto\SettingsDayOfMonthList;

/** Day of month endpoints, under `/api/{api_version}/settings/day_of_month`. */
final class DayOfMonth
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List the days of the month a date can be aligned to - `GET /settings/day_of_month`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsDaysOfMonth(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(DayOfMonthUrls::SETTINGS_DAYS_OF_MONTH, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsDayOfMonthList::class);
    }

    /** Read one day of the month by its `dom_` id - `GET
     *  /settings/day_of_month/{day_of_month_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsDayOfMonth(ExsitedClient $client, int|string $dayOfMonthId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(DayOfMonthUrls::SETTINGS_DAY_OF_MONTH, pathParams: ['day_of_month_id' => $dayOfMonthId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsDayOfMonth::class);
    }
}
