<?php

declare(strict_types=1);

namespace Exsited\Resources\Workflows\WorkflowsDto;

use Exsited\Client\Dto;

/** One entry of the `data` list of WorkflowMilestoneList. */
final class WorkflowMilestoneListData extends Dto
{
    public function __construct(
        public readonly ?WorkflowMilestoneListDataActivityDefinition $activityDefinition = null,
        public readonly mixed $autoCreate = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $description = null,
        public readonly ?string $displayName = null,
        public readonly mixed $estimatedHours = null,
        public readonly ?string $href = null,
        public readonly mixed $icon = null,
        public readonly ?string $id = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $priority = null,
        public readonly mixed $sortOrder = null,
        public readonly ?string $status = null,
        public readonly ?WorkflowMilestoneListDataWorkflow $workflow = null,
        public readonly ?WorkflowMilestoneListDataWorkflowVersion $workflowVersion = null,
    ) {
    }
}
