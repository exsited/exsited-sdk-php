<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Tasks\TasksDto;

use Exsited\Sdk\Client\Dto;

/** The `completed_by` object of TaskView. */
final class TaskViewCompletedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
