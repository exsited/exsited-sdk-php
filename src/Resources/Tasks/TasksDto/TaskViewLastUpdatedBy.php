<?php

declare(strict_types=1);

namespace Exsited\Resources\Tasks\TasksDto;

use Exsited\Client\Dto;

/** The `last_updated_by` object of TaskView. */
final class TaskViewLastUpdatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
