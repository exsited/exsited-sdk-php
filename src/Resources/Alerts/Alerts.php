<?php

declare(strict_types=1);

namespace Exsited\Resources\Alerts;

use Exsited\Client\ApiResponse;
use Exsited\Client\ExsitedClient;
use Exsited\Resources\Alerts\AlertsDto\AlertsView;

/** Alert endpoints, under `/api/{api_version}/alerts`. */
final class Alerts
{
    /** List all - `GET /alerts`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAlerts(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AlertsUrls::ALERTS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AlertsView::class);
    }

    /** Get single - `GET /alerts/{alert_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAlert(ExsitedClient $client, int|string $alertId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AlertsUrls::ALERT, pathParams: ['alert_id' => $alertId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Alerts by account - `GET /alerts/account/{account_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAlertsAccountById(ExsitedClient $client, int|string $accountId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AlertsUrls::ALERTS_ACCOUNT_BY_ID, pathParams: ['account_id' => $accountId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AlertsView::class);
    }

    /** Alerts by employee - `GET /alerts/employee/{employee_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAlertsEmployeeById(ExsitedClient $client, int|string $employeeId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AlertsUrls::ALERTS_EMPLOYEE_BY_ID, pathParams: ['employee_id' => $employeeId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AlertsView::class);
    }

    /** Alerts by labour - `GET /alerts/labour/{labour_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAlertsLabourById(ExsitedClient $client, int|string $labourId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AlertsUrls::ALERTS_LABOUR_BY_ID, pathParams: ['labour_id' => $labourId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AlertsView::class);
    }
}
