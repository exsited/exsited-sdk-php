<?php

declare(strict_types=1);

namespace Exsited\Resources\RentalAssets;

use Exsited\Client\ApiResponse;
use Exsited\Client\Dto;
use Exsited\Client\ExsitedClient;
use Exsited\Errors\SdkUsageError;
use Exsited\Resources\RentalAssets\RentalAssetsDto\RentalAsset;
use Exsited\Resources\RentalAssets\RentalAssetsDto\RentalAssetAvailabilityList;
use Exsited\Resources\RentalAssets\RentalAssetsDto\RentalAssetList;
use Exsited\Resources\RentalAssets\RentalAssetsDto\RentalAssetProfileList;
use Exsited\Resources\RentalAssets\RentalAssetsDto\RentalAssetProfileView;

/** Rental asset endpoints, under `/api/{api_version}`. */
final class RentalAssets
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** Rental asset availability - `GET /rental_asset_availability`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getRentalAssetAvailability(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(RentalAssetsUrls::RENTAL_ASSET_AVAILABILITY, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: RentalAssetAvailabilityList::class);
    }

    /** Update rental asset availability - `PATCH /rental_asset_availability`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateRentalAssetAvailability(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(RentalAssetsUrls::RENTAL_ASSET_AVAILABILITY, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** List rental asset profiles - `GET /rental_asset_profiles`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getRentalAssetProfiles(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(RentalAssetsUrls::RENTAL_ASSET_PROFILES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: RentalAssetProfileList::class);
    }

    /** Create rental asset profile - `POST /rental_asset_profiles`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createRentalAssetProfile(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(RentalAssetsUrls::RENTAL_ASSET_PROFILES, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: RentalAssetProfileView::class);
    }

    /** List rental assets - `GET /rental_assets`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getRentalAssets(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(RentalAssetsUrls::RENTAL_ASSETS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: RentalAssetList::class);
    }

    /** Create rental asset - `POST /rental_assets`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createRentalAsset(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(RentalAssetsUrls::RENTAL_ASSETS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: RentalAsset::class);
    }

    /** Get rental asset profile - `GET /rental_asset_profiles/{rental_asset_profile_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getRentalAssetProfile(ExsitedClient $client, int|string $rentalAssetProfileId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(RentalAssetsUrls::RENTAL_ASSET_PROFILE, pathParams: ['rental_asset_profile_id' => $rentalAssetProfileId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: RentalAssetProfileView::class);
    }

    /** Update rental asset profile - `PATCH /rental_asset_profiles/{rental_asset_profile_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateRentalAssetProfile(ExsitedClient $client, int|string $rentalAssetProfileId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(RentalAssetsUrls::RENTAL_ASSET_PROFILE, pathParams: ['rental_asset_profile_id' => $rentalAssetProfileId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Delete rental asset profile - `DELETE /rental_asset_profiles/{rental_asset_profile_id}`. */
    public static function deleteRentalAssetProfile(ExsitedClient $client, int|string $rentalAssetProfileId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(RentalAssetsUrls::RENTAL_ASSET_PROFILE, pathParams: ['rental_asset_profile_id' => $rentalAssetProfileId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update rental asset - `PATCH /rental_assets/{rental_asset_uuid}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateRentalAsset(ExsitedClient $client, int|string $rentalAssetUuid, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(RentalAssetsUrls::RENTAL_ASSET, pathParams: ['rental_asset_uuid' => $rentalAssetUuid], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: RentalAsset::class);
    }

    /** Delete rental asset - `DELETE /rental_assets/{rental_asset_uuid}`. */
    public static function deleteRentalAsset(ExsitedClient $client, int|string $rentalAssetUuid, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(RentalAssetsUrls::RENTAL_ASSET, pathParams: ['rental_asset_uuid' => $rentalAssetUuid], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Get rental asset - `GET /rental_assets/{rental_asset_uuid}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getRentalAsset(ExsitedClient $client, int|string $rentalAssetUuid, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(RentalAssetsUrls::RENTAL_ASSET, pathParams: ['rental_asset_uuid' => $rentalAssetUuid], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: RentalAsset::class);
    }

    /** Cancel rental asset - `POST /rental_assets/{rental_asset_id}/cancel`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function cancelRentalAsset(ExsitedClient $client, int|string $rentalAssetId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(RentalAssetsUrls::RENTAL_ASSET_CANCEL, pathParams: ['rental_asset_id' => $rentalAssetId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: RentalAsset::class);
    }

    /** Reactivate rental asset - `POST /rental_assets/{rental_asset_id}/reactivate`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function reactivateRentalAsset(ExsitedClient $client, int|string $rentalAssetId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(RentalAssetsUrls::RENTAL_ASSET_REACTIVATE, pathParams: ['rental_asset_id' => $rentalAssetId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: RentalAsset::class);
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
