<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\AccountGroups;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\AccountGroups\AccountGroupsDto\SettingsAccountGroup;
use Exsited\Sdk\Resources\AccountGroups\AccountGroupsDto\SettingsAccountGroupList;

/** Account group endpoints, under `/api/{api_version}/settings/account_groups`. */
final class AccountGroups
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List the account groups - `GET /settings/account_groups`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsAccountGroups(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountGroupsUrls::SETTINGS_ACCOUNT_GROUPS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsAccountGroupList::class);
    }

    /** Create an account group; `name` is required - `POST /settings/account_groups`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsAccountGroup(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(AccountGroupsUrls::SETTINGS_ACCOUNT_GROUPS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsAccountGroup::class);
    }

    /** Read one account group by its `ag_` id - `GET /settings/account_groups/{account_group_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsAccountGroup(ExsitedClient $client, int|string $accountGroupId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountGroupsUrls::SETTINGS_ACCOUNT_GROUP, pathParams: ['account_group_id' => $accountGroupId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsAccountGroup::class);
    }

    /** Delete an account group no account uses - `DELETE
     *  /settings/account_groups/{account_group_id}`. */
    public static function deleteSettingsAccountGroup(ExsitedClient $client, int|string $accountGroupId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(AccountGroupsUrls::SETTINGS_ACCOUNT_GROUP, pathParams: ['account_group_id' => $accountGroupId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update an account group's fields or its status - `PATCH
     *  /settings/account_groups/{account_group_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsAccountGroup(ExsitedClient $client, int|string $accountGroupId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(AccountGroupsUrls::SETTINGS_ACCOUNT_GROUP, pathParams: ['account_group_id' => $accountGroupId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
