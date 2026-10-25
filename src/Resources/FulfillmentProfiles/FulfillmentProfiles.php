<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\FulfillmentProfiles;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\FulfillmentProfiles\FulfillmentProfilesDto\SettingsFulfillmentProfile;
use Exsited\Sdk\Resources\FulfillmentProfiles\FulfillmentProfilesDto\SettingsFulfillmentProfileList;

/** Fulfillment profile endpoints, under `/api/{api_version}/settings/fulfillment_profiles`. */
final class FulfillmentProfiles
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List fulfillment profiles - `GET /settings/fulfillment_profiles`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsFulfillmentProfiles(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(FulfillmentProfilesUrls::SETTINGS_FULFILLMENT_PROFILES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsFulfillmentProfileList::class);
    }

    /** Create a fulfillment profile - `POST /settings/fulfillment_profiles`; `statuses` needs one
     *  entry at least.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsFulfillmentProfile(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(FulfillmentProfilesUrls::SETTINGS_FULFILLMENT_PROFILES, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsFulfillmentProfile::class);
    }

    /** Get one fulfillment profile - `GET
     *  /settings/fulfillment_profiles/{fulfillment_profile_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsFulfillmentProfile(ExsitedClient $client, int|string $fulfillmentProfileId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(FulfillmentProfilesUrls::SETTINGS_FULFILLMENT_PROFILE, pathParams: ['fulfillment_profile_id' => $fulfillmentProfileId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsFulfillmentProfile::class);
    }

    /** Delete a fulfillment profile - `DELETE
     *  /settings/fulfillment_profiles/{fulfillment_profile_id}`. */
    public static function deleteSettingsFulfillmentProfile(ExsitedClient $client, int|string $fulfillmentProfileId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(FulfillmentProfilesUrls::SETTINGS_FULFILLMENT_PROFILE, pathParams: ['fulfillment_profile_id' => $fulfillmentProfileId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update a fulfillment profile - `PATCH
     *  /settings/fulfillment_profiles/{fulfillment_profile_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsFulfillmentProfile(ExsitedClient $client, int|string $fulfillmentProfileId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(FulfillmentProfilesUrls::SETTINGS_FULFILLMENT_PROFILE, pathParams: ['fulfillment_profile_id' => $fulfillmentProfileId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsFulfillmentProfile::class);
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
