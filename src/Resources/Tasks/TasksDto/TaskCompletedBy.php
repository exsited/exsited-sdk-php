<?php

declare(strict_types=1);

namespace Exsited\Resources\Tasks\TasksDto;

use Exsited\Client\Dto;

/** The `completed_by` object of Task. */
final class TaskCompletedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
