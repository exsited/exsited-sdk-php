<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomFeatures;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\CustomFeatures\CustomFeaturesDto\CustomFeature;
use Exsited\Sdk\Resources\CustomFeatures\CustomFeaturesDto\CustomFeatureList;

/** Custom feature endpoints, under `/api/{api_version}`. */
final class CustomFeatures
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** Create custom feature - `POST /custom_feature`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createCustomFeature(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(CustomFeaturesUrls::CUSTOM_FEATURE, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: CustomFeature::class);
    }

    /** Delete custom feature - `DELETE /component/{custom_feature_id}`. */
    public static function deleteComponentById(ExsitedClient $client, int|string $customFeatureId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(CustomFeaturesUrls::COMPONENT_BY_ID, pathParams: ['custom_feature_id' => $customFeatureId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update custom feature - `PATCH /custom_feature/{custom_feature_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateCustomFeatureById(ExsitedClient $client, int|string $customFeatureId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(CustomFeaturesUrls::CUSTOM_FEATURE_BY_ID, pathParams: ['custom_feature_id' => $customFeatureId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: CustomFeature::class);
    }

    /** Customize form layout and attributes - `POST
     *  /custom_feature/{custom_feature_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createCustomFeatureById(ExsitedClient $client, int|string $customFeatureId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(CustomFeaturesUrls::CUSTOM_FEATURE_BY_ID, pathParams: ['custom_feature_id' => $customFeatureId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: CustomFeature::class);
    }

    /** List custom features - `GET /custom_feature`, cursor paged, the active ones only.
     *  @param array<string,mixed>|null $queryParams */
    public static function getCustomFeatures(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CustomFeaturesUrls::CUSTOM_FEATURE, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: CustomFeatureList::class);
    }

    /** Retrieve custom feature - `GET /custom_feature/{custom_feature_id}`, the `cmp_` id, under
     *  `custom_feature`; a deleted one is `404`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getCustomFeatureById(ExsitedClient $client, int|string $customFeatureId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CustomFeaturesUrls::CUSTOM_FEATURE_BY_ID, pathParams: ['custom_feature_id' => $customFeatureId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: CustomFeature::class);
    }

    /** Delete custom feature - `DELETE /custom_feature/{custom_feature_id}`, the `cmp_` id;
     *  answered `204`. */
    public static function deleteCustomFeatureById(ExsitedClient $client, int|string $customFeatureId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(CustomFeaturesUrls::CUSTOM_FEATURE_BY_ID, pathParams: ['custom_feature_id' => $customFeatureId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
