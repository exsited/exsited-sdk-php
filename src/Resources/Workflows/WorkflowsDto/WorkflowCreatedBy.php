<?php

declare(strict_types=1);

namespace Exsited\Resources\Workflows\WorkflowsDto;

use Exsited\Client\Dto;

/** A `Workflow`'s `created_by`. */
final class WorkflowCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $object = null,
        public readonly ?string $name = null,
    ) {
    }
}
