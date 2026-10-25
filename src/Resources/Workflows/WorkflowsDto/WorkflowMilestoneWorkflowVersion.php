<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Workflows\WorkflowsDto;

use Exsited\Sdk\Client\Dto;

/** A `WorkflowMilestone`'s `workflow_version`. */
final class WorkflowMilestoneWorkflowVersion extends Dto
{
    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
