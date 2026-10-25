<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ApprovalUserGroups;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\ApprovalUserGroups\ApprovalUserGroupsDto\SettingsApprovalUserGroup;
use Exsited\Sdk\Resources\ApprovalUserGroups\ApprovalUserGroupsDto\SettingsApprovalUserGroupList;

/** Approval user group endpoints, under `/api/{api_version}/settings/approval_user_groups`. */
final class ApprovalUserGroups
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List the approval user groups - `GET /settings/approval_user_groups`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsApprovalUserGroups(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ApprovalUserGroupsUrls::SETTINGS_APPROVAL_USER_GROUPS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsApprovalUserGroupList::class);
    }

    /** Create an approval user group; `name` is required - `POST /settings/approval_user_groups`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsApprovalUserGroup(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ApprovalUserGroupsUrls::SETTINGS_APPROVAL_USER_GROUPS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsApprovalUserGroup::class);
    }

    /** Read one approval user group by its `aug_` id - `GET
     *  /settings/approval_user_groups/{approval_user_group_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsApprovalUserGroup(ExsitedClient $client, int|string $approvalUserGroupId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ApprovalUserGroupsUrls::SETTINGS_APPROVAL_USER_GROUP, pathParams: ['approval_user_group_id' => $approvalUserGroupId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsApprovalUserGroup::class);
    }

    /** Delete an approval user group - `DELETE
     *  /settings/approval_user_groups/{approval_user_group_id}`. */
    public static function deleteSettingsApprovalUserGroup(ExsitedClient $client, int|string $approvalUserGroupId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(ApprovalUserGroupsUrls::SETTINGS_APPROVAL_USER_GROUP, pathParams: ['approval_user_group_id' => $approvalUserGroupId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update an approval user group's name, display name or description - `PATCH
     *  /settings/approval_user_groups/{approval_user_group_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsApprovalUserGroup(ExsitedClient $client, int|string $approvalUserGroupId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(ApprovalUserGroupsUrls::SETTINGS_APPROVAL_USER_GROUP, pathParams: ['approval_user_group_id' => $approvalUserGroupId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsApprovalUserGroup::class);
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
