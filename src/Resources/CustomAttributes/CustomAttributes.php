<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomAttributes;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\CustomAttributes\CustomAttributesDto\CustomAttribute;
use Exsited\Sdk\Resources\CustomAttributes\CustomAttributesDto\CustomAttributeList;
use Exsited\Sdk\Resources\CustomAttributes\CustomAttributesDto\CustomAttributesView;

/** Custom attribute endpoints, under `/api/{api_version}/custom_attributes`. */
final class CustomAttributes
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List all custom attributes - `GET /custom_attributes`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getCustomAttributes(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CustomAttributesUrls::CUSTOM_ATTRIBUTES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: CustomAttributeList::class);
    }

    /** Create custom attribute - `POST /custom_attributes`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createCustomAttribute(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(CustomAttributesUrls::CUSTOM_ATTRIBUTES, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: CustomAttributesView::class);
    }

    /** Delete custom attribute - `DELETE
     *  /custom_attributes/{custom_attribute_id}`. */
    public static function deleteCustomAttribute(ExsitedClient $client, int|string $customAttributeId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(CustomAttributesUrls::CUSTOM_ATTRIBUTE, pathParams: ['custom_attribute_id' => $customAttributeId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Get custom attribute details - `GET /custom_attributes/{custom_attribute_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getCustomAttribute(ExsitedClient $client, int|string $customAttributeId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CustomAttributesUrls::CUSTOM_ATTRIBUTE, pathParams: ['custom_attribute_id' => $customAttributeId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: CustomAttribute::class);
    }

    /** Update custom attribute - `PATCH /custom_attributes/{custom_attribute_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateCustomAttribute(ExsitedClient $client, int|string $customAttributeId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(CustomAttributesUrls::CUSTOM_ATTRIBUTE, pathParams: ['custom_attribute_id' => $customAttributeId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: CustomAttribute::class);
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
