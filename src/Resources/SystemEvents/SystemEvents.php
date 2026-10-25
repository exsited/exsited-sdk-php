<?php

declare(strict_types=1);

namespace Exsited\Resources\SystemEvents;

use Exsited\Client\ApiResponse;
use Exsited\Client\ExsitedClient;
use Exsited\Resources\SystemEvents\SystemEventsDto\SettingsSystemEvent;
use Exsited\Resources\SystemEvents\SystemEventsDto\SettingsSystemEventList;

/** System event endpoints, under `/api/{api_version}/settings/system_events`. */
final class SystemEvents
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List the base system events - `GET /settings/system_events`; reference data, read only.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsSystemEvents(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SystemEventsUrls::SETTINGS_SYSTEM_EVENTS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsSystemEventList::class);
    }

    /** Get one system event - `GET /settings/system_events/{system_event_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsSystemEvent(ExsitedClient $client, int|string $systemEventId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SystemEventsUrls::SETTINGS_SYSTEM_EVENT, pathParams: ['system_event_id' => $systemEventId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsSystemEvent::class);
    }
}
