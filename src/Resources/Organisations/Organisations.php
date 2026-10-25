<?php

declare(strict_types=1);

namespace Exsited\Resources\Organisations;

use Exsited\Client\ApiResponse;
use Exsited\Client\Dto;
use Exsited\Client\ExsitedClient;
use Exsited\Errors\SdkUsageError;

/** Child organisation endpoints, under `/api/{api_version}/settings/organisations`. */
final class Organisations
{
    /** List the child organisations - `GET /settings/organisations`; the root is never among them.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsOrganisations(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OrganisationsUrls::SETTINGS_ORGANISATIONS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Create a child organisation - `POST /settings/organisations`; the envelope is
     *  `organization`, with a z.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsOrganisation(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(OrganisationsUrls::SETTINGS_ORGANISATIONS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Get one organisation - `GET /settings/organisations/{organisation_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsOrganisation(ExsitedClient $client, int|string $organisationId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OrganisationsUrls::SETTINGS_ORGANISATION, pathParams: ['organisation_id' => $organisationId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Delete an organisation - `DELETE /settings/organisations/{organisation_id}`. */
    public static function deleteSettingsOrganisation(ExsitedClient $client, int|string $organisationId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(OrganisationsUrls::SETTINGS_ORGANISATION, pathParams: ['organisation_id' => $organisationId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update an organisation - `PATCH /settings/organisations/{organisation_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsOrganisation(ExsitedClient $client, int|string $organisationId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(OrganisationsUrls::SETTINGS_ORGANISATION, pathParams: ['organisation_id' => $organisationId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
