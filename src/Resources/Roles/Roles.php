<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Roles;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\Roles\RolesDto\SettingsRole;
use Exsited\Sdk\Resources\Roles\RolesDto\SettingsRoleList;

/** Role endpoints, under `/api/{api_version}/settings/roles`. */
final class Roles
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List roles - `GET /settings/roles`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsRoles(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(RolesUrls::SETTINGS_ROLES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsRoleList::class);
    }

    /** Create a role - `POST /settings/roles`; on develop_work the role is saved and the answer is
     *  then a 500, from a lookup that no longer exists.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsRole(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(RolesUrls::SETTINGS_ROLES, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Get one role - `GET /settings/roles/{role_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsRole(ExsitedClient $client, int|string $roleId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(RolesUrls::SETTINGS_ROLE, pathParams: ['role_id' => $roleId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsRole::class);
    }

    /** Delete a role - `DELETE /settings/roles/{role_id}`; a system role is refused. */
    public static function deleteSettingsRole(ExsitedClient $client, int|string $roleId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(RolesUrls::SETTINGS_ROLE, pathParams: ['role_id' => $roleId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update or enable/disable a role - `PATCH /settings/roles/{role_id}`; on develop_work the
     *  change is saved and the answer is then a 500, from a lookup that no longer exists.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsRole(ExsitedClient $client, int|string $roleId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(RolesUrls::SETTINGS_ROLE, pathParams: ['role_id' => $roleId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
