<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Employees\EmployeesDto;

use Exsited\Sdk\Client\Dto;

/** The `last_updated_by` object of Employee. */
final class EmployeeLastUpdatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
