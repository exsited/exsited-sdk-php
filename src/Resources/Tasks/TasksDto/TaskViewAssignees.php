<?php

declare(strict_types=1);

namespace Exsited\Resources\Tasks\TasksDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The `assignees` object of TaskView. */
final class TaskViewAssignees extends Dto
{
    /** @param list<TaskViewAssigneesSelectedEmployee|null>|null $selectedEmployees
     *  @param list<TaskViewAssigneesSelectedLabour|null>|null $selectedLabours */
    public function __construct(
        public readonly ?array $manuallyAddedAccountContacts = null,
        public readonly ?array $selectedAccountContacts = null,
        #[ListOf(TaskViewAssigneesSelectedEmployee::class)]
        public readonly ?array $selectedEmployees = null,
        #[ListOf(TaskViewAssigneesSelectedLabour::class)]
        public readonly ?array $selectedLabours = null,
        public readonly ?array $selectedOperators = null,
    ) {
    }
}
