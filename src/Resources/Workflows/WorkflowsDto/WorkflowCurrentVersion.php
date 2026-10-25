<?php

declare(strict_types=1);

namespace Exsited\Resources\Workflows\WorkflowsDto;

use Exsited\Client\Dto;

/** A `Workflow`'s `current_version`. */
final class WorkflowCurrentVersion extends Dto
{
    public function __construct(
        public readonly ?string $object = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
    ) {
    }
}
