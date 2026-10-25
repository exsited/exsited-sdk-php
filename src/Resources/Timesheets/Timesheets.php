<?php

declare(strict_types=1);

namespace Exsited\Resources\Timesheets;

use Exsited\Client\ApiResponse;
use Exsited\Client\Dto;
use Exsited\Client\ExsitedClient;
use Exsited\Errors\SdkUsageError;
use Exsited\Resources\Timesheets\TimesheetsDto\TimesheetList;
use Exsited\Resources\Timesheets\TimesheetsDto\TimesheetUpdated;
use Exsited\Resources\Timesheets\TimesheetsDto\TimesheetsView;

/** Timesheet endpoints, under `/api/{api_version}/timesheets`. */
final class Timesheets
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List all timesheets - `GET /timesheets`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getTimesheets(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(TimesheetsUrls::TIMESHEETS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: TimesheetList::class);
    }

    /** Create timesheet - `POST /timesheets`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createTimesheet(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(TimesheetsUrls::TIMESHEETS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: TimesheetsView::class);
    }

    /** Delete timesheet - `DELETE /timesheets/{timesheet_id}`. */
    public static function deleteTimesheet(ExsitedClient $client, int|string $createdTimesheetId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(TimesheetsUrls::TIMESHEET, pathParams: ['timesheet_id' => $createdTimesheetId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update timesheet - `PATCH /timesheets/{timesheet_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateTimesheet(ExsitedClient $client, int|string $createdTimesheetId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(TimesheetsUrls::TIMESHEET, pathParams: ['timesheet_id' => $createdTimesheetId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: TimesheetUpdated::class);
    }

    /** Get one timesheet - `GET /timesheets/{timesheet_id}`, by the `ts_` id the listing and the
     *  create answer.
     *  @param array<string,mixed>|null $queryParams */
    public static function getTimesheet(ExsitedClient $client, int|string $timesheetId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(TimesheetsUrls::TIMESHEET, pathParams: ['timesheet_id' => $timesheetId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: TimesheetsView::class);
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
