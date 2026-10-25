<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\BillingPeriods;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\BillingPeriods\BillingPeriodsDto\SettingsBillingPeriod;
use Exsited\Sdk\Resources\BillingPeriods\BillingPeriodsDto\SettingsBillingPeriodList;

/** Billing period endpoints, under `/api/{api_version}/settings/billing_periods`. */
final class BillingPeriods
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List the billing periods - `GET /settings/billing_periods`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsBillingPeriods(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(BillingPeriodsUrls::SETTINGS_BILLING_PERIODS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsBillingPeriodList::class);
    }

    /** Create a billing period; `name` and `time_period` are required, and `time_period` is the
     *  time period's hyphenated uuid, not its `tp_` id - `POST /settings/billing_periods`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsBillingPeriod(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(BillingPeriodsUrls::SETTINGS_BILLING_PERIODS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsBillingPeriod::class);
    }

    /** Read one billing period by its `bp_` id - `GET
     *  /settings/billing_periods/{billing_period_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsBillingPeriod(ExsitedClient $client, int|string $billingPeriodId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(BillingPeriodsUrls::SETTINGS_BILLING_PERIOD, pathParams: ['billing_period_id' => $billingPeriodId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsBillingPeriod::class);
    }

    /** Delete a billing period - `DELETE /settings/billing_periods/{billing_period_id}`. */
    public static function deleteSettingsBillingPeriod(ExsitedClient $client, int|string $billingPeriodId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(BillingPeriodsUrls::SETTINGS_BILLING_PERIOD, pathParams: ['billing_period_id' => $billingPeriodId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update a billing period; the answer carries `time_period` in place of `period` and
     *  `duration` - `PATCH /settings/billing_periods/{billing_period_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsBillingPeriod(ExsitedClient $client, int|string $billingPeriodId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(BillingPeriodsUrls::SETTINGS_BILLING_PERIOD, pathParams: ['billing_period_id' => $billingPeriodId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsBillingPeriod::class);
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
