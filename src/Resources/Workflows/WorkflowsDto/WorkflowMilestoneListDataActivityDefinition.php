<?php

declare(strict_types=1);

namespace Exsited\Resources\Workflows\WorkflowsDto;

use Exsited\Client\Dto;

/** The `activity_definition` object of WorkflowMilestoneListData. */
final class WorkflowMilestoneListDataActivityDefinition extends Dto
{
    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
