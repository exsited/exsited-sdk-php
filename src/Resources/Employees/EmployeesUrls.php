<?php

declare(strict_types=1);

namespace Exsited\Resources\Employees;

final class EmployeesUrls
{
    public const EMPLOYEES = '/api/{api_version}/employees';
    public const EMPLOYEE = '/api/{api_version}/employees/{employee_id}';

    /** The key the `EMPLOYEES` listing's records sit under. */
    public const EMPLOYEES_KEY = 'data';

    /** The envelope one `employee` record arrives under. */
    public const EMPLOYEE_KEY = 'employee';
}
