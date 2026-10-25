<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Employees\EmployeesDto;

use Exsited\Sdk\Client\Dto;

/** The `email` object of EmployeeContact. */
final class EmployeeContactEmail extends Dto
{
    public function __construct(
        public readonly ?string $address = null,
        public readonly ?bool $emailOptedOut = null,
    ) {
    }
}
