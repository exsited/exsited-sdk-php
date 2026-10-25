<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\SettingsWorkflows;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Resources\SettingsWorkflows\SettingsWorkflowsDto\SettingsWorkflow;
use Exsited\Sdk\Resources\SettingsWorkflows\SettingsWorkflowsDto\SettingsWorkflowList;

/** Settings workflow endpoints, under `/api/{api_version}/settings/workflows`. */
final class SettingsWorkflows
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List workflows - `GET /settings/workflows`; read only here, the writes live under
     *  `/workflows`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsWorkflows(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsWorkflowsUrls::SETTINGS_WORKFLOWS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsWorkflowList::class);
    }

    /** Get one workflow - `GET /settings/workflows/{workflow_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsWorkflow(ExsitedClient $client, int|string $workflowId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsWorkflowsUrls::SETTINGS_WORKFLOW, pathParams: ['workflow_id' => $workflowId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsWorkflow::class);
    }
}
