<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ApprovalProfiles;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\ApprovalProfiles\ApprovalProfilesDto\SettingsApprovalProfile;
use Exsited\Sdk\Resources\ApprovalProfiles\ApprovalProfilesDto\SettingsApprovalProfileList;

/** Approval profile endpoints, under `/api/{api_version}/settings/approval_profiles`. */
final class ApprovalProfiles
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List the approval profiles - `GET /settings/approval_profiles`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsApprovalProfiles(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ApprovalProfilesUrls::SETTINGS_APPROVAL_PROFILES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsApprovalProfileList::class);
    }

    /** Create an approval profile; `name`, `entity`, `event`, `approver_type` and `approver` are
     *  required - `POST /settings/approval_profiles`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsApprovalProfile(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ApprovalProfilesUrls::SETTINGS_APPROVAL_PROFILES, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Read one approval profile by its `ap_` id - `GET
     *  /settings/approval_profiles/{approval_profile_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsApprovalProfile(ExsitedClient $client, int|string $approvalProfileId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ApprovalProfilesUrls::SETTINGS_APPROVAL_PROFILE, pathParams: ['approval_profile_id' => $approvalProfileId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsApprovalProfile::class);
    }

    /** Delete an approval profile that is not in use - `DELETE
     *  /settings/approval_profiles/{approval_profile_id}`. */
    public static function deleteSettingsApprovalProfile(ExsitedClient $client, int|string $approvalProfileId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(ApprovalProfilesUrls::SETTINGS_APPROVAL_PROFILE, pathParams: ['approval_profile_id' => $approvalProfileId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update an approval profile's fields or its status - `PATCH
     *  /settings/approval_profiles/{approval_profile_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsApprovalProfile(ExsitedClient $client, int|string $approvalProfileId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(ApprovalProfilesUrls::SETTINGS_APPROVAL_PROFILE, pathParams: ['approval_profile_id' => $approvalProfileId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
