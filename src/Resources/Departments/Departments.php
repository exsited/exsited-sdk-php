<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Departments;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Resources\Departments\DepartmentsDto\SettingsDepartment;
use Exsited\Sdk\Resources\Departments\DepartmentsDto\SettingsDepartmentList;

/** Department endpoints, under `/api/{api_version}/settings/departments`. */
final class Departments
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List the departments; some carry no `id` and cannot be read singly - `GET
     *  /settings/departments`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsDepartments(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(DepartmentsUrls::SETTINGS_DEPARTMENTS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsDepartmentList::class);
    }

    /** Read one department by its `dept_` id - `GET /settings/departments/{department_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsDepartment(ExsitedClient $client, int|string $departmentId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(DepartmentsUrls::SETTINGS_DEPARTMENT, pathParams: ['department_id' => $departmentId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsDepartment::class);
    }
}
