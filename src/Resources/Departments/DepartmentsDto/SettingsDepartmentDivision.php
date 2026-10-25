<?php

declare(strict_types=1);

namespace Exsited\Resources\Departments\DepartmentsDto;

use Exsited\Client\Dto;

/** A `SettingsDepartment`'s `division`. */
final class SettingsDepartmentDivision extends Dto
{
    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
