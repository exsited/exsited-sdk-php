<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\FulfillmentTerms;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\FulfillmentTerms\FulfillmentTermsDto\SettingsFulfillmentTerm;
use Exsited\Sdk\Resources\FulfillmentTerms\FulfillmentTermsDto\SettingsFulfillmentTermList;

/** Fulfillment term endpoints, under `/api/{api_version}/settings/fulfillment_terms`. */
final class FulfillmentTerms
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List fulfillment terms - `GET /settings/fulfillment_terms`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsFulfillmentTerms(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(FulfillmentTermsUrls::SETTINGS_FULFILLMENT_TERMS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsFulfillmentTermList::class);
    }

    /** Create a fulfillment term - `POST /settings/fulfillment_terms`; `period` is sent upper case
     *  and answered lower case.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsFulfillmentTerm(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(FulfillmentTermsUrls::SETTINGS_FULFILLMENT_TERMS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsFulfillmentTerm::class);
    }

    /** Get one fulfillment term - `GET /settings/fulfillment_terms/{fulfillment_term_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsFulfillmentTerm(ExsitedClient $client, int|string $fulfillmentTermId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(FulfillmentTermsUrls::SETTINGS_FULFILLMENT_TERM, pathParams: ['fulfillment_term_id' => $fulfillmentTermId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsFulfillmentTerm::class);
    }

    /** Delete a fulfillment term - `DELETE /settings/fulfillment_terms/{fulfillment_term_id}`. */
    public static function deleteSettingsFulfillmentTerm(ExsitedClient $client, int|string $fulfillmentTermId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(FulfillmentTermsUrls::SETTINGS_FULFILLMENT_TERM, pathParams: ['fulfillment_term_id' => $fulfillmentTermId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update or enable/disable a fulfillment term - `PATCH
     *  /settings/fulfillment_terms/{fulfillment_term_id}`; `status` takes active or inactive.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsFulfillmentTerm(ExsitedClient $client, int|string $fulfillmentTermId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(FulfillmentTermsUrls::SETTINGS_FULFILLMENT_TERM, pathParams: ['fulfillment_term_id' => $fulfillmentTermId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsFulfillmentTerm::class);
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
