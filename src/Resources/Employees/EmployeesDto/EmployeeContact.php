<?php

declare(strict_types=1);

namespace Exsited\Resources\Employees\EmployeesDto;

use Exsited\Client\Dto;

/** One entry of the `contacts` list of Employee. */
final class EmployeeContact extends Dto
{
    public function __construct(
        public readonly mixed $address = null,
        public readonly ?EmployeeContactCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?EmployeeContactEmail $email = null,
        public readonly mixed $fax = null,
        public readonly ?string $id = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly mixed $lastUpdatedOn = null,
        public readonly mixed $mobile = null,
        public readonly ?EmployeeContactName $name = null,
        public readonly ?string $object = null,
        public readonly mixed $phone = null,
        public readonly ?string $status = null,
        public readonly ?string $type = null,
        public readonly ?int $version = null,
    ) {
    }
}
