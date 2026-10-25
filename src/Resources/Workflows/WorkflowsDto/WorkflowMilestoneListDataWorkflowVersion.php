<?php

declare(strict_types=1);

namespace Exsited\Resources\Workflows\WorkflowsDto;

use Exsited\Client\Dto;

/** The `workflow_version` object of WorkflowMilestoneListData. */
final class WorkflowMilestoneListDataWorkflowVersion extends Dto
{
    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
