<?php

declare(strict_types=1);

namespace Exsited\Resources\Tasks\TasksDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The TaskView body, as measured from the endpoints in MEASURED_FROM. */
final class TaskView extends Dto
{
    public const ENVELOPE_KEY = 'work_task';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/tasks/{task_id}',
        'PATCH /api/{api_version}/tasks/{task_id}',
        'GET /api/{api_version}/tasks/{task_id}/checklist',
        'POST /api/{api_version}/tasks/{task_id}/checklist',
        'GET /api/{api_version}/tasks/{task_id}/checklist/{task_checklist_uuid}',
        'POST /api/{api_version}/tasks',
        'PATCH /api/{api_version}/tasks/{task_id}/checklist/{task_checklist_uuid}',
    ];

    /** @param list<TaskViewActivityLog|null>|null $activityLogs */
    public function __construct(
        #[ListOf(TaskViewActivityLog::class)]
        public readonly ?array $activityLogs = null,
        public readonly mixed $actualHours = null,
        public readonly ?array $alerts = null,
        public readonly ?TaskViewAssignees $assignees = null,
        public readonly mixed $checklist = null,
        public readonly ?string $code = null,
        public readonly ?string $completedAt = null,
        public readonly ?TaskViewCompletedBy $completedBy = null,
        public readonly ?TaskViewCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?array $customAttributes = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $dueDate = null,
        public readonly ?int $estimatedHours = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?TaskViewLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly mixed $milestone = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly mixed $parentTask = null,
        public readonly ?string $priority = null,
        public readonly mixed $resource = null,
        public readonly ?int $sortOrder = null,
        public readonly mixed $startAfter = null,
        public readonly ?string $startDate = null,
        public readonly mixed $state = null,
        public readonly ?string $status = null,
        public readonly ?string $taskStatus = null,
        public readonly ?int $version = null,
        public readonly mixed $workflow = null,
    ) {
    }
}
