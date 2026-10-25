<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ActionScripts;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\ActionScripts\ActionScriptsDto\ActionScript;
use Exsited\Sdk\Resources\ActionScripts\ActionScriptsDto\ActionScriptList;

/** Action script endpoints, under `/api/{api_version}/action_scripts`. */
final class ActionScripts
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List action scripts - `GET /action_scripts`; deleted scripts are left out.
     *  @param array<string,mixed>|null $queryParams */
    public static function getActionScripts(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ActionScriptsUrls::ACTION_SCRIPTS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ActionScriptList::class);
    }

    /** One action script - `GET /action_scripts/{action_script_id}`; the id is the `ascr_` one.
     *  @param array<string,mixed>|null $queryParams */
    public static function getActionScript(ExsitedClient $client, int|string $actionScriptId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ActionScriptsUrls::ACTION_SCRIPT, pathParams: ['action_script_id' => $actionScriptId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ActionScript::class);
    }

    /** Store an action script - `POST /action_scripts`, under `action_script`; `name` is required
     *  and unique, and a `script_file` is a `.js` file sent as base64 `content`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createActionScript(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ActionScriptsUrls::ACTION_SCRIPTS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ActionScript::class);
    }

    /** Update an action script - `PATCH /action_scripts/{action_script_id}`, under
     *  `action_script`; an unknown key is refused.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateActionScript(ExsitedClient $client, int|string $actionScriptId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(ActionScriptsUrls::ACTION_SCRIPT, pathParams: ['action_script_id' => $actionScriptId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ActionScript::class);
    }

    /** Delete an action script - `DELETE /action_scripts/{action_script_id}`; answered `204`. */
    public static function deleteActionScript(ExsitedClient $client, int|string $actionScriptId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(ActionScriptsUrls::ACTION_SCRIPT, pathParams: ['action_script_id' => $actionScriptId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
