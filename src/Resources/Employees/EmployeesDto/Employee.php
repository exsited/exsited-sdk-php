<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Employees\EmployeesDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The Employee body, as measured from the endpoints in MEASURED_FROM. */
final class Employee extends Dto
{
    public const ENVELOPE_KEY = 'employee';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/employees',
        'POST /api/{api_version}/employees',
        'GET /api/{api_version}/employees/{employee_id}',
        'PATCH /api/{api_version}/employees/{employee_id}',
    ];

    /** @param list<EmployeeContact|null>|null $contacts */
    public function __construct(
        public readonly ?array $activityLogs = null,
        public readonly ?string $code = null,
        #[ListOf(EmployeeContact::class)]
        public readonly ?array $contacts = null,
        public readonly ?EmployeeCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?array $customAttributes = null,
        public readonly ?EmployeeCustomForm $customForm = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $emailAddress = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $imageUuid = null,
        public readonly ?EmployeeLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
