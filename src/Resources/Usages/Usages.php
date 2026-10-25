<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Usages;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\Usages\UsagesDto\Usage;
use Exsited\Sdk\Resources\Usages\UsagesDto\UsageList;
use Exsited\Sdk\Resources\Usages\UsagesDto\UsageUpdated;
use Exsited\Sdk\Resources\Usages\UsagesDto\UsagesView;

/** Usage endpoints, under `/api/{api_version}/usages`. */
final class Usages
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List of usages - `GET /usages`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getUsages(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(UsagesUrls::USAGES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: UsageList::class);
    }

    /** Create bulk usages - `POST /usages`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createUsage(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(UsagesUrls::USAGES, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: UsagesView::class);
    }

    /** Get multiple usages - `GET /usages/{usage_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getUsage(ExsitedClient $client, int|string $usageId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(UsagesUrls::USAGE, pathParams: ['usage_id' => $usageId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: Usage::class);
    }

    /** Delete usage - `DELETE /usages/{usage_id}`. */
    public static function deleteUsage(ExsitedClient $client, int|string $usageId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(UsagesUrls::USAGE, pathParams: ['usage_id' => $usageId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Partial update usage - `PATCH /usages/{usage_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateUsage(ExsitedClient $client, int|string $usageId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(UsagesUrls::USAGE, pathParams: ['usage_id' => $usageId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: UsageUpdated::class);
    }

    /** Full replace usage - `PUT /usages/{usage_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function replaceUsage(ExsitedClient $client, int|string $usageId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPutRequest(UsagesUrls::USAGE, pathParams: ['usage_id' => $usageId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: UsageUpdated::class);
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
