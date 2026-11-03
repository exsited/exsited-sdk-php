<?php

declare(strict_types=1);

namespace Exsited\Resources\OperatorGroups;

use Exsited\Client\ApiResponse;
use Exsited\Client\Dto;
use Exsited\Client\ExsitedClient;
use Exsited\Errors\SdkUsageError;
use Exsited\Resources\OperatorGroups\OperatorGroupsDto\SettingsOperatorGroup;
use Exsited\Resources\OperatorGroups\OperatorGroupsDto\SettingsOperatorGroupList;

/** Operator group endpoints, under `/api/{api_version}/settings/operator_groups`. */
final class OperatorGroups
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List the operator groups - `GET /settings/operator_groups`; paged by cursor.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsOperatorGroups(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OperatorGroupsUrls::SETTINGS_OPERATOR_GROUPS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsOperatorGroupList::class);
    }

    /** Create an operator group - `POST /settings/operator_groups`; `201`. `role` is required and
     *  takes the role's dashed uuid, its `rol_` id being refused.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsOperatorGroup(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(OperatorGroupsUrls::SETTINGS_OPERATOR_GROUPS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsOperatorGroup::class);
    }

    /** Read one operator group - `GET /settings/operator_groups/{operator_group_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsOperatorGroup(ExsitedClient $client, int|string $operatorGroupId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OperatorGroupsUrls::SETTINGS_OPERATOR_GROUP, pathParams: ['operator_group_id' => $operatorGroupId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsOperatorGroup::class);
    }

    /** Delete an operator group - `DELETE /settings/operator_groups/{operator_group_id}`; answered
     *  `204`. */
    public static function deleteSettingsOperatorGroup(ExsitedClient $client, int|string $operatorGroupId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(OperatorGroupsUrls::SETTINGS_OPERATOR_GROUP, pathParams: ['operator_group_id' => $operatorGroupId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update an operator group - `PATCH /settings/operator_groups/{operator_group_id}`; the answer
     *  names `role` as a reference carrying the dashed uuid.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsOperatorGroup(ExsitedClient $client, int|string $operatorGroupId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(OperatorGroupsUrls::SETTINGS_OPERATOR_GROUP, pathParams: ['operator_group_id' => $operatorGroupId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsOperatorGroup::class);
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
