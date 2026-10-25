<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Employees;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\Employees\EmployeesDto\Employee;
use Exsited\Sdk\Resources\Employees\EmployeesDto\EmployeeList;

/** Employee endpoints, under `/api/{api_version}/employees`. */
final class Employees
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List employees - `GET /employees`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getEmployees(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(EmployeesUrls::EMPLOYEES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: EmployeeList::class);
    }

    /** Create employee - `POST /employees`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createEmployee(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(EmployeesUrls::EMPLOYEES, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: Employee::class);
    }

    /** Delete employee - `DELETE /employees/{employee_id}`. */
    public static function deleteEmployee(ExsitedClient $client, int|string $employeeId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(EmployeesUrls::EMPLOYEE, pathParams: ['employee_id' => $employeeId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Get employee - `GET /employees/{employee_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getEmployee(ExsitedClient $client, int|string $employeeId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(EmployeesUrls::EMPLOYEE, pathParams: ['employee_id' => $employeeId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: Employee::class);
    }

    /** Update employee - `PATCH /employees/{employee_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateEmployee(ExsitedClient $client, int|string $employeeId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(EmployeesUrls::EMPLOYEE, pathParams: ['employee_id' => $employeeId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: Employee::class);
    }

    private static function requirePayload(array|string|Dto $payload): void
    {
        if ($payload === [] || (is_string($payload) && trim($payload) === '')) {
            throw new SdkUsageError(
                'payload is required: this endpoint takes a body, and an empty one '
                . 'sends the request with nothing in it'
            );
        }
    }
}
