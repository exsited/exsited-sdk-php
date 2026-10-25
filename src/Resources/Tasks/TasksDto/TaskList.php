<?php

declare(strict_types=1);

namespace Exsited\Resources\Tasks\TasksDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** A page of Task records under `data`; an unreadable entry is null and keeps its place. */
final class TaskList extends Dto
{
    /** The endpoints this page view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/tasks',
    ];

    /** @param list<Task|null>|null $data */
    public function __construct(
        #[ListOf(Task::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
