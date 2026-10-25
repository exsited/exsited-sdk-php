<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Labours;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\Labours\LaboursDto\Labour;
use Exsited\Sdk\Resources\Labours\LaboursDto\LabourAvailabilityList;
use Exsited\Sdk\Resources\Labours\LaboursDto\LabourCalendar;
use Exsited\Sdk\Resources\Labours\LaboursDto\LabourList;
use Exsited\Sdk\Resources\Labours\LaboursDto\LabourOrderList;
use Exsited\Sdk\Resources\Labours\LaboursDto\LabourProfileList;
use Exsited\Sdk\Resources\Labours\LaboursDto\LabourProfileSessionList;
use Exsited\Sdk\Resources\Labours\LaboursDto\LabourProfileSessionView;
use Exsited\Sdk\Resources\Labours\LaboursDto\LabourProfileView;

/** Labour endpoints, under `/api/{api_version}`. */
final class Labours
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** Labour availability - `GET /labour_availability`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getLabourAvailability(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(LaboursUrls::LABOUR_AVAILABILITY, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: LabourAvailabilityList::class);
    }

    /** List labour profiles - `GET /labour_profiles`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getLabourProfiles(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(LaboursUrls::LABOUR_PROFILES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: LabourProfileList::class);
    }

    /** Create labour profile - `POST /labour_profiles`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createLabourProfile(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(LaboursUrls::LABOUR_PROFILES, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: LabourProfileView::class);
    }

    /** List labours - `GET /labours`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getLabours(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(LaboursUrls::LABOURS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: LabourList::class);
    }

    /** Create labour - `POST /labours`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createLabour(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(LaboursUrls::LABOURS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: Labour::class);
    }

    /** Get labour profile - `GET /labour_profiles/{labour_profile_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getLabourProfile(ExsitedClient $client, int|string $labourProfileId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(LaboursUrls::LABOUR_PROFILE, pathParams: ['labour_profile_id' => $labourProfileId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: LabourProfileView::class);
    }

    /** Update labour profile - `PATCH /labour_profiles/{labour_profile_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateLabourProfile(ExsitedClient $client, int|string $labourProfileId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(LaboursUrls::LABOUR_PROFILE, pathParams: ['labour_profile_id' => $labourProfileId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Delete labour profile - `DELETE /labour_profiles/{labour_profile_id}`. */
    public static function deleteLabourProfile(ExsitedClient $client, int|string $labourProfileId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(LaboursUrls::LABOUR_PROFILE, pathParams: ['labour_profile_id' => $labourProfileId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Available labours - `GET /labours/available_for_booking`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getLaboursAvailableForBooking(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(LaboursUrls::LABOURS_AVAILABLE_FOR_BOOKING, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: LabourList::class);
    }

    /** Update labour - `PATCH /labours/{labour_uuid}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateLabour(ExsitedClient $client, int|string $labourUuid, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(LaboursUrls::LABOUR, pathParams: ['labour_uuid' => $labourUuid], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: Labour::class);
    }

    /** Delete labour - `DELETE /labours/{labour_uuid}`. */
    public static function deleteLabour(ExsitedClient $client, int|string $labourUuid, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(LaboursUrls::LABOUR, pathParams: ['labour_uuid' => $labourUuid], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Get labour - `GET /labours/{labour_uuid}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getLabour(ExsitedClient $client, int|string $labourUuid, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(LaboursUrls::LABOUR, pathParams: ['labour_uuid' => $labourUuid], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: Labour::class);
    }

    /** Cancel labour - `POST /labours/{labour_id}/cancel`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function cancelLabour(ExsitedClient $client, int|string $labourId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(LaboursUrls::LABOUR_CANCEL, pathParams: ['labour_id' => $labourId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: Labour::class);
    }

    /** Reactivate labour - `POST /labours/{labour_id}/reactivate`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function reactivateLabour(ExsitedClient $client, int|string $labourId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(LaboursUrls::LABOUR_REACTIVATE, pathParams: ['labour_id' => $labourId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: Labour::class);
    }

    /** Get labour orders - `GET /labours/{labour_uuid}/orders`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getLabourOrders(ExsitedClient $client, int|string $labourUuid, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(LaboursUrls::LABOUR_ORDERS, pathParams: ['labour_uuid' => $labourUuid], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: LabourOrderList::class);
    }

    /** Edit availability slots in bulk - `PATCH /labour_availability`; the body is `{"labours":
     *  [{"id", "labour_availability", "labour_custom_availability"}]}`, `204`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateLabourAvailability(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(LaboursUrls::LABOUR_AVAILABILITY, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** List a labour profile's sessions - `GET /labour_profiles/{labour_profile_id}/sessions`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getLabourProfileSessions(ExsitedClient $client, int|string $labourProfileId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(LaboursUrls::LABOUR_PROFILE_SESSIONS, pathParams: ['labour_profile_id' => $labourProfileId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: LabourProfileSessionList::class);
    }

    /** Get one labour profile session - `GET
     *  /labour_profiles/{labour_profile_id}/sessions/{session_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getLabourProfileSession(ExsitedClient $client, int|string $labourProfileId, int|string $sessionId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(LaboursUrls::LABOUR_PROFILE_SESSION, pathParams: ['labour_profile_id' => $labourProfileId, 'session_id' => $sessionId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: LabourProfileSessionView::class);
    }

    /** One labour's availability calendar - `GET /labours/{labour_id}/availability`, under
     *  `labour_calendar`; the id or the code.
     *  @param array<string,mixed>|null $queryParams */
    public static function getLabourCalendar(ExsitedClient $client, int|string $labourId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(LaboursUrls::LABOUR_CALENDAR, pathParams: ['labour_id' => $labourId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: LabourCalendar::class);
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
