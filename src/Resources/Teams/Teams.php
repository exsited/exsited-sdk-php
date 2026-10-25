<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Teams;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\Teams\TeamsDto\SettingsTeam;
use Exsited\Sdk\Resources\Teams\TeamsDto\SettingsTeamList;

/** Team endpoints, under `/api/{api_version}/settings/teams`. */
final class Teams
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List teams - `GET /settings/teams`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsTeams(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(TeamsUrls::SETTINGS_TEAMS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsTeamList::class);
    }

    /** Create a team - `POST /settings/teams`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsTeam(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(TeamsUrls::SETTINGS_TEAMS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsTeam::class);
    }

    /** Get one team - `GET /settings/teams/{team_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsTeam(ExsitedClient $client, int|string $teamId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(TeamsUrls::SETTINGS_TEAM, pathParams: ['team_id' => $teamId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsTeam::class);
    }

    /** Delete a team - `DELETE /settings/teams/{team_id}`; refused while the team has members. */
    public static function deleteSettingsTeam(ExsitedClient $client, int|string $teamId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(TeamsUrls::SETTINGS_TEAM, pathParams: ['team_id' => $teamId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update or enable/disable a team - `PATCH /settings/teams/{team_id}`; `status` takes active
     *  or inactive.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsTeam(ExsitedClient $client, int|string $teamId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(TeamsUrls::SETTINGS_TEAM, pathParams: ['team_id' => $teamId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsTeam::class);
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
