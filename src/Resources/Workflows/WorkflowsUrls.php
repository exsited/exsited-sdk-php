<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Workflows;

final class WorkflowsUrls
{
    public const MILESTONE = '/api/{api_version}/milestones/{milestone_uuid}';
    public const WORKFLOW_COMPONENT_BY_ID = '/api/{api_version}/workflow/component/{cc_id}';
    public const WORKFLOW_MILESTONES = '/api/{api_version}/workflows/{workflow_uuid}/milestones';
    public const WORKFLOW_COMPONENT_CC_MILESTONE = '/api/{api_version}/workflow/component/{cc_id}/milestone';
    public const WORKFLOW_COMPONENT_HISTORY = '/api/{api_version}/workflow/component/{component_object_id}/history';
    public const WORKFLOW_COMPONENT_CC_INSTANCE_CC_MILESTONE = '/api/{api_version}/workflow/component/{component_uuid}/{component_object_id}/milestone';
    public const WORKFLOWS = '/api/{api_version}/workflows';
    public const WORKFLOW = '/api/{api_version}/workflows/{workflow_id}';
    public const WORKFLOW_STAGES = '/api/{api_version}/workflows/{workflow_id}/stages';
    public const WORKFLOW_STAGE = '/api/{api_version}/workflows/{workflow_id}/stages/{stage_id}';
    public const WORKFLOW_MILESTONE = '/api/{api_version}/workflows/{workflow_id}/milestones/{milestone_id}';
    public const WORKFLOW_CUSTOM_COMPONENT_HISTORY = '/api/{api_version}/workflows/custom_components/{component_uuid}/{object_code}/history';
    public const WORKFLOW_CUSTOM_COMPONENT_MILESTONES = '/api/{api_version}/workflows/custom_components/{component_uuid}/{object_code}/milestones';
    public const WORKFLOW_CUSTOM_COMPONENT_MILESTONE = '/api/{api_version}/workflows/custom_components/{component_uuid}/{object_code}/milestones/{milestone_id}';

    /** The key the `WORKFLOWS` listing's records sit under. */
    public const WORKFLOWS_KEY = 'data';

    /** The key the `WORKFLOW_STAGES` listing's records sit under. */
    public const WORKFLOW_STAGES_KEY = 'data';

    /** The key the `WORKFLOW` listing's records sit under. */
    public const WORKFLOW_KEY = 'workflow';

    /** The key the `WORKFLOW_MILESTONE` listing's records sit under. */
    public const WORKFLOW_MILESTONE_KEY = 'workflow_milestone';

    /** The key the `WORKFLOW_STAGE` listing's records sit under. */
    public const WORKFLOW_STAGE_KEY = 'workflow_stage';

    /** The envelope one `workflow_milestone_instance` record arrives under. */
    public const WORKFLOW_MILESTONE_INSTANCE_KEY = 'workflow_milestone_instance';
}
