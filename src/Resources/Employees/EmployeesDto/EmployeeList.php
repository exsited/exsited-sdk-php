<?php

declare(strict_types=1);

namespace Exsited\Resources\Employees\EmployeesDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** A page of Employee records under `data`; an unreadable entry is null and keeps its place. */
final class EmployeeList extends Dto
{
    /** The endpoints this page view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/employees',
    ];

    /** @param list<Employee|null>|null $data */
    public function __construct(
        #[ListOf(Employee::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
