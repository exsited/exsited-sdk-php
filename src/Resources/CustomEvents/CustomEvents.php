<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomEvents;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\CustomEvents\CustomEventsDto\SettingsCustomEvent;
use Exsited\Sdk\Resources\CustomEvents\CustomEventsDto\SettingsCustomEventList;

/** Custom event endpoints, under `/api/{api_version}/settings/custom_events`. */
final class CustomEvents
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List the custom events - `GET /settings/custom_events`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsCustomEvents(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CustomEventsUrls::SETTINGS_CUSTOM_EVENTS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsCustomEventList::class);
    }

    /** Create a custom event; `name` and `base_event`, an `se_` id, are required, and a message is
     *  added to every communication profile - `POST /settings/custom_events`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsCustomEvent(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(CustomEventsUrls::SETTINGS_CUSTOM_EVENTS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Read one custom event by its `ce_` id - `GET /settings/custom_events/{custom_event_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsCustomEvent(ExsitedClient $client, int|string $customEventId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CustomEventsUrls::SETTINGS_CUSTOM_EVENT, pathParams: ['custom_event_id' => $customEventId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsCustomEvent::class);
    }

    /** Delete a custom event no workflow uses - `DELETE
     *  /settings/custom_events/{custom_event_id}`. */
    public static function deleteSettingsCustomEvent(ExsitedClient $client, int|string $customEventId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(CustomEventsUrls::SETTINGS_CUSTOM_EVENT, pathParams: ['custom_event_id' => $customEventId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update a custom event's fields or its status - `PATCH
     *  /settings/custom_events/{custom_event_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsCustomEvent(ExsitedClient $client, int|string $customEventId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(CustomEventsUrls::SETTINGS_CUSTOM_EVENT, pathParams: ['custom_event_id' => $customEventId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
