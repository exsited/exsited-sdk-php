<?php

declare(strict_types=1);

namespace Exsited\Resources\Employees\EmployeesDto;

use Exsited\Client\Dto;

/** The `name` object of EmployeeContact. */
final class EmployeeContactName extends Dto
{
    public function __construct(
        public readonly mixed $designation = null,
        public readonly ?string $first = null,
        public readonly ?string $last = null,
        public readonly mixed $middle = null,
        public readonly mixed $salutation = null,
    ) {
    }
}
