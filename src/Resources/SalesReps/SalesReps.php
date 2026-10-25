<?php

declare(strict_types=1);

namespace Exsited\Resources\SalesReps;

use Exsited\Client\ApiResponse;
use Exsited\Client\Dto;
use Exsited\Client\ExsitedClient;
use Exsited\Errors\SdkUsageError;
use Exsited\Resources\SalesReps\SalesRepsDto\SettingsSalesRep;
use Exsited\Resources\SalesReps\SalesRepsDto\SettingsSalesRepList;

/** Sales rep endpoints, under `/api/{api_version}/settings/sales_reps`. */
final class SalesReps
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List sales reps - `GET /settings/sales_reps`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsSalesReps(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SalesRepsUrls::SETTINGS_SALES_REPS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsSalesRepList::class);
    }

    /** Create a sales rep - `POST /settings/sales_reps`; answers 400 validation_error,
     *  naming no field, even for a valid body.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsSalesRep(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(SalesRepsUrls::SETTINGS_SALES_REPS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Get one sales rep - `GET /settings/sales_reps/{sales_rep_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsSalesRep(ExsitedClient $client, int|string $salesRepId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SalesRepsUrls::SETTINGS_SALES_REP, pathParams: ['sales_rep_id' => $salesRepId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsSalesRep::class);
    }

    /** Delete a sales rep - `DELETE /settings/sales_reps/{sales_rep_id}`. */
    public static function deleteSettingsSalesRep(ExsitedClient $client, int|string $salesRepId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(SalesRepsUrls::SETTINGS_SALES_REP, pathParams: ['sales_rep_id' => $salesRepId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update or enable/disable a sales rep - `PATCH /settings/sales_reps/{sales_rep_id}`;
     *  `status` takes active or inactive.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsSalesRep(ExsitedClient $client, int|string $salesRepId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(SalesRepsUrls::SETTINGS_SALES_REP, pathParams: ['sales_rep_id' => $salesRepId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
