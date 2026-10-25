<?php

declare(strict_types=1);

namespace Exsited\Resources\Departments;

final class DepartmentsUrls
{
    public const SETTINGS_DEPARTMENTS = '/api/{api_version}/settings/departments';
    public const SETTINGS_DEPARTMENT = '/api/{api_version}/settings/departments/{department_id}';

    /** The key the `SETTINGS_DEPARTMENTS` listing's records sit under. */
    public const SETTINGS_DEPARTMENTS_KEY = 'data';

    /** The envelope one `department` record arrives under. */
    public const DEPARTMENT_KEY = 'department';
}
