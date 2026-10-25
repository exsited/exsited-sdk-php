<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Workflows\WorkflowsDto;

use Exsited\Sdk\Client\Dto;

/** A `Workflow`'s `last_updated_by`. */
final class WorkflowLastUpdatedBy extends Dto
{
    public function __construct(
        public readonly ?string $object = null,
        public readonly ?string $name = null,
    ) {
    }
}
