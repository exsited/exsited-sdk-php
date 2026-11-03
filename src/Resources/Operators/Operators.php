<?php

declare(strict_types=1);

namespace Exsited\Resources\Operators;

use Exsited\Client\ApiResponse;
use Exsited\Client\Dto;
use Exsited\Client\ExsitedClient;
use Exsited\Errors\SdkUsageError;
use Exsited\Resources\Operators\OperatorsDto\SettingsOperator;
use Exsited\Resources\Operators\OperatorsDto\SettingsOperatorList;

/** Operator endpoints, under `/api/{api_version}/settings/operators`. */
final class Operators
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List the operators - `GET /settings/operators`; paged by cursor.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsOperators(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OperatorsUrls::SETTINGS_OPERATORS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsOperatorList::class);
    }

    /** Create an operator - `POST /settings/operators`; `201`. `role` and `operator_group` take
     *  dashed uuids.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsOperator(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(OperatorsUrls::SETTINGS_OPERATORS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsOperator::class);
    }

    /** Read one operator - `GET /settings/operators/{operator_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsOperator(ExsitedClient $client, int|string $operatorId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OperatorsUrls::SETTINGS_OPERATOR, pathParams: ['operator_id' => $operatorId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsOperator::class);
    }

    /** Update an operator - `PATCH /settings/operators/{operator_id}`; `description` is refused as
     *  not understood.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsOperator(ExsitedClient $client, int|string $operatorId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(OperatorsUrls::SETTINGS_OPERATOR, pathParams: ['operator_id' => $operatorId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsOperator::class);
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
