<?php

declare(strict_types=1);

namespace Exsited\Resources\PricingPeriods;

use Exsited\Client\ApiResponse;
use Exsited\Client\Dto;
use Exsited\Client\ExsitedClient;
use Exsited\Errors\SdkUsageError;
use Exsited\Resources\PricingPeriods\PricingPeriodsDto\SettingsPricingPeriod;
use Exsited\Resources\PricingPeriods\PricingPeriodsDto\SettingsPricingPeriodList;

/** Pricing period endpoints, under `/api/{api_version}/settings/pricing_periods`. */
final class PricingPeriods
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List pricing periods - `GET /settings/pricing_periods`; `time_period` reads null here,
     *  whatever the record holds.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsPricingPeriods(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PricingPeriodsUrls::SETTINGS_PRICING_PERIODS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsPricingPeriodList::class);
    }

    /** Create a pricing period - `POST /settings/pricing_periods`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsPricingPeriod(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(PricingPeriodsUrls::SETTINGS_PRICING_PERIODS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsPricingPeriod::class);
    }

    /** Get one pricing period - `GET /settings/pricing_periods/{pricing_period_id}`; `time_period`
     *  reads null here, whatever the record holds.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsPricingPeriod(ExsitedClient $client, int|string $pricingPeriodId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PricingPeriodsUrls::SETTINGS_PRICING_PERIOD, pathParams: ['pricing_period_id' => $pricingPeriodId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsPricingPeriod::class);
    }

    /** Delete a pricing period - `DELETE /settings/pricing_periods/{pricing_period_id}`. */
    public static function deleteSettingsPricingPeriod(ExsitedClient $client, int|string $pricingPeriodId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(PricingPeriodsUrls::SETTINGS_PRICING_PERIOD, pathParams: ['pricing_period_id' => $pricingPeriodId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update or enable/disable a pricing period - `PATCH
     *  /settings/pricing_periods/{pricing_period_id}`; `status` takes active or inactive.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsPricingPeriod(ExsitedClient $client, int|string $pricingPeriodId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(PricingPeriodsUrls::SETTINGS_PRICING_PERIOD, pathParams: ['pricing_period_id' => $pricingPeriodId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsPricingPeriod::class);
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
