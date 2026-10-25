<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Workflows\WorkflowsDto;

use Exsited\Sdk\Client\Dto;

/** One milestone definition, under `workflow_milestone`: what `getWorkflowMilestone` answers, the
 *  same fields as a listed one. */
final class WorkflowMilestoneView extends Dto
{
    public const ENVELOPE_KEY = 'workflow_milestone';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/workflows/{workflow_id}/milestones/{milestone_id}',
    ];

    public function __construct(
        public readonly ?WorkflowMilestoneActivityDefinition $activityDefinition = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $autoCreate = null,
        public readonly ?string $createdOn = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $description = null,
        public readonly ?string $displayName = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $estimatedHours = null,
        public readonly ?string $href = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $icon = null,
        public readonly ?string $id = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $priority = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $sortOrder = null,
        public readonly ?string $status = null,
        public readonly ?WorkflowMilestoneDetail $workflow = null,
        public readonly ?WorkflowMilestoneWorkflowVersion $workflowVersion = null,
    ) {
    }
}
