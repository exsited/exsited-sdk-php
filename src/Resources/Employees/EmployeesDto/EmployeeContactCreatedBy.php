<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Employees\EmployeesDto;

use Exsited\Sdk\Client\Dto;

/** The `created_by` object of EmployeeContact. */
final class EmployeeContactCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
