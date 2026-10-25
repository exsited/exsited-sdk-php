<?php

declare(strict_types=1);

namespace Exsited\Resources\CommunicationProfiles;

use Exsited\Client\ApiResponse;
use Exsited\Client\Dto;
use Exsited\Client\ExsitedClient;
use Exsited\Errors\SdkUsageError;
use Exsited\Resources\CommunicationProfiles\CommunicationProfilesDto\SettingsCommunicationProfile;
use Exsited\Resources\CommunicationProfiles\CommunicationProfilesDto\SettingsCommunicationProfileList;

/** Communication profile endpoints, under `/api/{api_version}/settings/communication_profiles`. */
final class CommunicationProfiles
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List the communication profiles - `GET /settings/communication_profiles`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsCommunicationProfiles(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CommunicationProfilesUrls::SETTINGS_COMMUNICATION_PROFILES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsCommunicationProfileList::class);
    }

    /** Create a communication profile; `name` is required, and its messages are copied from
     *  `copy_from` or else from the default profile - `POST /settings/communication_profiles`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsCommunicationProfile(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(CommunicationProfilesUrls::SETTINGS_COMMUNICATION_PROFILES, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Read one communication profile by its `cmp_` id - `GET
     *  /settings/communication_profiles/{communication_profile_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsCommunicationProfile(ExsitedClient $client, int|string $communicationProfileId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CommunicationProfilesUrls::SETTINGS_COMMUNICATION_PROFILE, pathParams: ['communication_profile_id' => $communicationProfileId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsCommunicationProfile::class);
    }

    /** Delete a communication profile that is not the default - `DELETE
     *  /settings/communication_profiles/{communication_profile_id}`. */
    public static function deleteSettingsCommunicationProfile(ExsitedClient $client, int|string $communicationProfileId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(CommunicationProfilesUrls::SETTINGS_COMMUNICATION_PROFILE, pathParams: ['communication_profile_id' => $communicationProfileId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update a communication profile's fields and channel settings - `PATCH
     *  /settings/communication_profiles/{communication_profile_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsCommunicationProfile(ExsitedClient $client, int|string $communicationProfileId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(CommunicationProfilesUrls::SETTINGS_COMMUNICATION_PROFILE, pathParams: ['communication_profile_id' => $communicationProfileId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
