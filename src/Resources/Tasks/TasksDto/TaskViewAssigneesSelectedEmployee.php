<?php

declare(strict_types=1);

namespace Exsited\Resources\Tasks\TasksDto;

use Exsited\Client\Dto;

/** One entry of the `selected_employees` list of TaskViewAssignees. */
final class TaskViewAssigneesSelectedEmployee extends Dto
{
    public function __construct(
        public readonly ?int $displayOrder = null,
        public readonly ?string $email = null,
        public readonly ?string $employeeCode = null,
        public readonly ?string $name = null,
        public readonly mixed $responsibility = null,
        public readonly ?string $uuid = null,
    ) {
    }
}
