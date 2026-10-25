<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Departments\DepartmentsDto;

use Exsited\Sdk\Client\Dto;

/** The settings department body, under `department`. */
final class SettingsDepartment extends Dto
{
    public const ENVELOPE_KEY = 'department';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/departments',
        'GET /api/{api_version}/settings/departments/{department_id}',
    ];

    public function __construct(
        public readonly ?string $code = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?SettingsDepartmentDivision $division = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
