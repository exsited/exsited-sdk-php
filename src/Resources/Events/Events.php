<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Events;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\Events\EventsDto\Event;
use Exsited\Sdk\Resources\Events\EventsDto\EventList;

/** Event endpoints, under `/api/{api_version}/events`. */
final class Events
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List all events - `GET /events`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getEvents(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(EventsUrls::EVENTS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: EventList::class);
    }

    /** Get single event - `GET /events/{event_uuid}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getEvent(ExsitedClient $client, int|string $eventUuid, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(EventsUrls::EVENT, pathParams: ['event_uuid' => $eventUuid], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: Event::class);
    }

    /** Execute event - `POST /events/{event_uuid}/execute`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createEventExecute(ExsitedClient $client, int|string $eventUuid, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(EventsUrls::EVENT_EXECUTE, pathParams: ['event_uuid' => $eventUuid], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Remove event - `POST /events/{event_uuid}/remove`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createEventRemove(ExsitedClient $client, int|string $eventUuid, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(EventsUrls::EVENT_REMOVE, pathParams: ['event_uuid' => $eventUuid], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: Event::class);
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
