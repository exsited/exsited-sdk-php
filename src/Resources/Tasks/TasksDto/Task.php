<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Tasks\TasksDto;

use Exsited\Sdk\Client\Dto;

/** The Task body, as measured from the endpoints in MEASURED_FROM. */
final class Task extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/tasks',
    ];

    public function __construct(
        public readonly mixed $actualHours = null,
        public readonly ?string $code = null,
        public readonly ?string $completedAt = null,
        public readonly ?TaskCompletedBy $completedBy = null,
        public readonly ?TaskCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?array $customAttributes = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $dueDate = null,
        public readonly ?int $estimatedHours = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?TaskLastUpdatedBy $lastUpdatedBy = null,
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
