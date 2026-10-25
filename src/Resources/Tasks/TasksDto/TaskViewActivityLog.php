<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Tasks\TasksDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `activity_logs` list of TaskView. */
final class TaskViewActivityLog extends Dto
{
    public function __construct(
        public readonly ?string $activity = null,
    ) {
    }
}
