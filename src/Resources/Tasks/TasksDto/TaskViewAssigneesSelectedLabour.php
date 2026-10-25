<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Tasks\TasksDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `selected_labours` list of TaskViewAssignees. */
final class TaskViewAssigneesSelectedLabour extends Dto
{
    public function __construct(
        public readonly ?int $displayOrder = null,
        public readonly ?string $email = null,
        public readonly ?string $labourCode = null,
        public readonly ?string $name = null,
        public readonly mixed $responsibility = null,
        public readonly ?string $uuid = null,
    ) {
    }
}
