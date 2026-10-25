<?php

declare(strict_types=1);

namespace Exsited\Resources\Tasks\TasksDto;

use Exsited\Client\Dto;

/** The `created_by` object of TaskView. */
final class TaskViewCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
