<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Workflows;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\Workflows\WorkflowsDto\WorkflowList;
use Exsited\Sdk\Resources\Workflows\WorkflowsDto\WorkflowMilestoneList;
use Exsited\Sdk\Resources\Workflows\WorkflowsDto\WorkflowMilestoneView;
use Exsited\Sdk\Resources\Workflows\WorkflowsDto\WorkflowView;

/** Workflow endpoints, under `/api/{api_version}`. */
final class Workflows
{
    /** Delete milestone (V4) - `DELETE /milestones/{milestone_uuid}`. */
    public static function deleteMilestone(ExsitedClient $client, int|string $milestoneUuid, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(WorkflowsUrls::MILESTONE, pathParams: ['milestone_uuid' => $milestoneUuid], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update component workflow - `PATCH /workflow/component/{cc_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateWorkflowComponentById(ExsitedClient $client, int|string $ccId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(WorkflowsUrls::WORKFLOW_COMPONENT_BY_ID, pathParams: ['cc_id' => $ccId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Get workflow milestones (V4) - `GET /workflows/{workflow_uuid}/milestones`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getWorkflowMilestones(ExsitedClient $client, int|string $workflowUuid, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(WorkflowsUrls::WORKFLOW_MILESTONES, pathParams: ['workflow_uuid' => $workflowUuid], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: WorkflowMilestoneList::class);
    }

    /** Schedule milestones - `POST /workflow/component/{cc_id}/milestone`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createWorkflowComponentCcMilestone(ExsitedClient $client, int|string $ccId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(WorkflowsUrls::WORKFLOW_COMPONENT_CC_MILESTONE, pathParams: ['cc_id' => $ccId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Workflow history of one component instance, by its code - `GET
     *  /workflow/component/{component_object_id}/history`; answered under `histories`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getWorkflowComponentHistory(ExsitedClient $client, int|string $componentObjectId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(WorkflowsUrls::WORKFLOW_COMPONENT_HISTORY, pathParams: ['component_object_id' => $componentObjectId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Milestones of one component instance, by the component's uuid and the instance's code -
     *  `GET /workflow/component/{component_uuid}/{component_object_id}/milestone`; answered under
     *  `milestones`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getWorkflowComponentCcInstanceCcMilestone(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(WorkflowsUrls::WORKFLOW_COMPONENT_CC_INSTANCE_CC_MILESTONE, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** List workflows - `GET /workflows`, cursor paged; a deleted one is not listed.
     *  @param array<string,mixed>|null $queryParams */
    public static function getWorkflows(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(WorkflowsUrls::WORKFLOWS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: WorkflowList::class);
    }

    /** Retrieve one workflow - `GET /workflows/{workflow_id}`, the `wf_` id or the `code`, under
     *  `workflow`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getWorkflow(ExsitedClient $client, int|string $workflowId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(WorkflowsUrls::WORKFLOW, pathParams: ['workflow_id' => $workflowId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: WorkflowView::class);
    }

    /** Create a workflow, as a draft - `POST /workflows`, wrapped in `workflow`; `name` is
     *  required and any key but the eight the handler reads is refused.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createWorkflow(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(WorkflowsUrls::WORKFLOWS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: WorkflowView::class);
    }

    /** Update a workflow or move its status - `PATCH /workflows/{workflow_id}`, wrapped in
     *  `workflow`; `DRAFT` goes to `ACTIVE`, and `ACTIVE` and `INACTIVE` to each other.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateWorkflow(ExsitedClient $client, int|string $workflowId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(WorkflowsUrls::WORKFLOW, pathParams: ['workflow_id' => $workflowId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: WorkflowView::class);
    }

    /** Delete a workflow - `DELETE /workflows/{workflow_id}`; answered `204`. The record is kept
     *  as `DELETED` and reads `404` after; a pre-built workflow is refused. */
    public static function deleteWorkflow(ExsitedClient $client, int|string $workflowId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(WorkflowsUrls::WORKFLOW, pathParams: ['workflow_id' => $workflowId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** List a workflow's stages - `GET /workflows/{workflow_id}/stages`. No typed view.
     *  @param array<string,mixed>|null $queryParams */
    public static function getWorkflowStages(ExsitedClient $client, int|string $workflowId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(WorkflowsUrls::WORKFLOW_STAGES, pathParams: ['workflow_id' => $workflowId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Retrieve one stage - `GET /workflows/{workflow_id}/stages/{stage_id}`, the `wfs_` id, under
     *  `workflow_stage`, with no typed view.
     *  @param array<string,mixed>|null $queryParams */
    public static function getWorkflowStage(ExsitedClient $client, int|string $workflowId, int|string $stageId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(WorkflowsUrls::WORKFLOW_STAGE, pathParams: ['workflow_id' => $workflowId, 'stage_id' => $stageId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Retrieve one milestone definition - `GET
     *  /workflows/{workflow_id}/milestones/{milestone_id}`, the `wfm_` id, under
     *  `workflow_milestone`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getWorkflowMilestone(ExsitedClient $client, int|string $workflowId, int|string $milestoneId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(WorkflowsUrls::WORKFLOW_MILESTONE, pathParams: ['workflow_id' => $workflowId, 'milestone_id' => $milestoneId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: WorkflowMilestoneView::class);
    }

    /** Workflow history of one component instance - `GET
     *  /workflows/custom_components/{component_uuid}/{object_code}/history`, the component's
     *  dashed uuid and the instance's `code`. Only seen empty, so no typed view.
     *  @param array<string,mixed>|null $queryParams */
    public static function getWorkflowCustomComponentHistory(ExsitedClient $client, int|string $componentUuid, int|string $objectCode, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(WorkflowsUrls::WORKFLOW_CUSTOM_COMPONENT_HISTORY, pathParams: ['component_uuid' => $componentUuid, 'object_code' => $objectCode], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Milestones of one component instance - `GET
     *  /workflows/custom_components/{component_uuid}/{object_code}/milestones`, the component's
     *  dashed uuid and the instance's `code`. Only seen empty, so no typed view.
     *  @param array<string,mixed>|null $queryParams */
    public static function getWorkflowCustomComponentMilestones(ExsitedClient $client, int|string $componentUuid, int|string $objectCode, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(WorkflowsUrls::WORKFLOW_CUSTOM_COMPONENT_MILESTONES, pathParams: ['component_uuid' => $componentUuid, 'object_code' => $objectCode], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** One milestone of one component instance - `GET
     *  /workflows/custom_components/{component_uuid}/{object_code}/milestones/{milestone_id}`, the
     *  `wfmi_` id, under `workflow_milestone_instance`, with no typed view.
     *  @param array<string,mixed>|null $queryParams */
    public static function getWorkflowCustomComponentMilestone(ExsitedClient $client, int|string $componentUuid, int|string $objectCode, int|string $milestoneId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(WorkflowsUrls::WORKFLOW_CUSTOM_COMPONENT_MILESTONE, pathParams: ['component_uuid' => $componentUuid, 'object_code' => $objectCode, 'milestone_id' => $milestoneId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
