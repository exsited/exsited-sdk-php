<?php

declare(strict_types=1);

namespace Exsited\Resources\ReceiveTerms;

use Exsited\Client\ApiResponse;
use Exsited\Client\Dto;
use Exsited\Client\ExsitedClient;
use Exsited\Errors\SdkUsageError;
use Exsited\Resources\ReceiveTerms\ReceiveTermsDto\SettingsReceiveTerm;
use Exsited\Resources\ReceiveTerms\ReceiveTermsDto\SettingsReceiveTermList;

/** Receive term endpoints, under `/api/{api_version}/settings/receive_terms`. */
final class ReceiveTerms
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List receive terms - `GET /settings/receive_terms`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsReceiveTerms(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ReceiveTermsUrls::SETTINGS_RECEIVE_TERMS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsReceiveTermList::class);
    }

    /** Create a receive term - `POST /settings/receive_terms`; `period` is sent upper case and
     *  answered lower case.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsReceiveTerm(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ReceiveTermsUrls::SETTINGS_RECEIVE_TERMS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsReceiveTerm::class);
    }

    /** Get one receive term - `GET /settings/receive_terms/{receive_term_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsReceiveTerm(ExsitedClient $client, int|string $receiveTermId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ReceiveTermsUrls::SETTINGS_RECEIVE_TERM, pathParams: ['receive_term_id' => $receiveTermId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsReceiveTerm::class);
    }

    /** Delete a receive term - `DELETE /settings/receive_terms/{receive_term_id}`. */
    public static function deleteSettingsReceiveTerm(ExsitedClient $client, int|string $receiveTermId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(ReceiveTermsUrls::SETTINGS_RECEIVE_TERM, pathParams: ['receive_term_id' => $receiveTermId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update or enable/disable a receive term - `PATCH
     *  /settings/receive_terms/{receive_term_id}`; `status` takes active or inactive.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsReceiveTerm(ExsitedClient $client, int|string $receiveTermId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(ReceiveTermsUrls::SETTINGS_RECEIVE_TERM, pathParams: ['receive_term_id' => $receiveTermId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsReceiveTerm::class);
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
