<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Salutations;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\Salutations\SalutationsDto\SettingsSalutation;
use Exsited\Sdk\Resources\Salutations\SalutationsDto\SettingsSalutationList;

/** Salutation endpoints, under `/api/{api_version}/settings/salutations`. */
final class Salutations
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List salutations - `GET /settings/salutations`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsSalutations(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SalutationsUrls::SETTINGS_SALUTATIONS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsSalutationList::class);
    }

    /** Create a salutation - `POST /settings/salutations`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsSalutation(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(SalutationsUrls::SETTINGS_SALUTATIONS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsSalutation::class);
    }

    /** Get one salutation - `GET /settings/salutations/{salutation_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsSalutation(ExsitedClient $client, int|string $salutationId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SalutationsUrls::SETTINGS_SALUTATION, pathParams: ['salutation_id' => $salutationId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsSalutation::class);
    }

    /** Delete a salutation - `DELETE /settings/salutations/{salutation_id}`. */
    public static function deleteSettingsSalutation(ExsitedClient $client, int|string $salutationId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(SalutationsUrls::SETTINGS_SALUTATION, pathParams: ['salutation_id' => $salutationId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update a salutation - `PATCH /settings/salutations/{salutation_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsSalutation(ExsitedClient $client, int|string $salutationId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(SalutationsUrls::SETTINGS_SALUTATION, pathParams: ['salutation_id' => $salutationId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsSalutation::class);
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
