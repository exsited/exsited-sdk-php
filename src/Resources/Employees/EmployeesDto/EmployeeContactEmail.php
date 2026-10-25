<?php

declare(strict_types=1);

namespace Exsited\Resources\Employees\EmployeesDto;

use Exsited\Client\Dto;

/** The `email` object of EmployeeContact. */
final class EmployeeContactEmail extends Dto
{
    public function __construct(
        public readonly ?string $address = null,
        public readonly ?bool $emailOptedOut = null,
    ) {
    }
}
