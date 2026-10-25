<?php

declare(strict_types=1);

namespace Exsited\Resources\AlertResponsibility;

use Exsited\Client\ApiResponse;
use Exsited\Client\Dto;
use Exsited\Client\ExsitedClient;
use Exsited\Errors\SdkUsageError;
use Exsited\Resources\AlertResponsibility\AlertResponsibilityDto\AlertResponsibilityList;
use Exsited\Resources\AlertResponsibility\AlertResponsibilityDto\AlertResponsibilityView;

/** Alert responsibility endpoints, under `/api/{api_version}/alert_responsibility`. */
final class AlertResponsibility
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List alert responsibilities - `GET /alert_responsibility`, the singular path the workflow
     *  services serve.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAlertResponsibilities(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AlertResponsibilityUrls::ALERT_RESPONSIBILITIES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AlertResponsibilityList::class);
    }

    /** One alert responsibility - `GET /alert_responsibility/{alert_responsibility_id}`; the `ar_`
     *  id or the raw uuid.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAlertResponsibility(ExsitedClient $client, int|string $alertResponsibilityId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AlertResponsibilityUrls::ALERT_RESPONSIBILITY, pathParams: ['alert_responsibility_id' => $alertResponsibilityId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AlertResponsibilityView::class);
    }

    /** Create an alert responsibility - `POST /alert_responsibility`, under
     *  `alert_responsibility`; `name` is required and unique, beside `display_name` and
     *  `description` only.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createAlertResponsibility(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(AlertResponsibilityUrls::ALERT_RESPONSIBILITIES, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AlertResponsibilityView::class);
    }

    /** Update an alert responsibility - `PATCH /alert_responsibility/{alert_responsibility_id}`;
     *  `status` may move between `active` and `inactive` beside the three create keys.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateAlertResponsibility(ExsitedClient $client, int|string $alertResponsibilityId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(AlertResponsibilityUrls::ALERT_RESPONSIBILITY, pathParams: ['alert_responsibility_id' => $alertResponsibilityId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AlertResponsibilityView::class);
    }

    /** Delete an alert responsibility - `DELETE /alert_responsibility/{alert_responsibility_id}`,
     *  a soft delete; the id must be the `ar_` one. */
    public static function deleteAlertResponsibility(ExsitedClient $client, int|string $alertResponsibilityId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(AlertResponsibilityUrls::ALERT_RESPONSIBILITY, pathParams: ['alert_responsibility_id' => $alertResponsibilityId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
