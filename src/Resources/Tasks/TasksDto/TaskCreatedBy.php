<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Tasks\TasksDto;

use Exsited\Sdk\Client\Dto;

/** The `created_by` object of Task. */
final class TaskCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
