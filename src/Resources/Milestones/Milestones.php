<?php

declare(strict_types=1);

namespace Exsited\Resources\Milestones;

use Exsited\Client\ApiResponse;
use Exsited\Client\ExsitedClient;
use Exsited\Resources\Milestones\MilestonesDto\MilestonesView;

/** Milestone endpoints, under `/api/{api_version}`. */
final class Milestones
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List all milestones - `GET /milestones`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getMilestones(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(MilestonesUrls::MILESTONES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: MilestonesView::class);
    }

    /** Get milestones by account - `GET /milestones/account/{account_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getMilestonesAccountById(ExsitedClient $client, int|string $accountId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(MilestonesUrls::MILESTONES_ACCOUNT_BY_ID, pathParams: ['account_id' => $accountId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: MilestonesView::class);
    }

    /** Get milestones by labour - `GET /milestones/labour/{labour_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getMilestonesLabourById(ExsitedClient $client, int|string $labourId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(MilestonesUrls::MILESTONES_LABOUR_BY_ID, pathParams: ['labour_id' => $labourId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: MilestonesView::class);
    }

    /** Get milestones by employee - `GET /milestones/employee/{employee_code}`; the employee's
     *  `code`, since an `emp_` id answers `404`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getMilestonesEmployeeByCode(ExsitedClient $client, int|string $employeeCode, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(MilestonesUrls::MILESTONES_EMPLOYEE_BY_CODE, pathParams: ['employee_code' => $employeeCode], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: MilestonesView::class);
    }

    /** Get one milestone - `GET /milestones/{milestone_uuid}`, a `wfm_` id or its raw uuid; a
     *  workflow's milestone definition is a different record and answers `404`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getMilestone(ExsitedClient $client, int|string $milestoneUuid, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(MilestonesUrls::MILESTONE, pathParams: ['milestone_uuid' => $milestoneUuid], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }
}
