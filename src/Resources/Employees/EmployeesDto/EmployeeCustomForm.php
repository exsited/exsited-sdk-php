<?php

declare(strict_types=1);

namespace Exsited\Resources\Employees\EmployeesDto;

use Exsited\Client\Dto;

/** The `custom_form` object of Employee. */
final class EmployeeCustomForm extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
