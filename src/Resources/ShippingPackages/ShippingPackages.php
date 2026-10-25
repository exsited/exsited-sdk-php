<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ShippingPackages;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\ShippingPackages\ShippingPackagesDto\SettingsShippingPackage;
use Exsited\Sdk\Resources\ShippingPackages\ShippingPackagesDto\SettingsShippingPackageList;

/** Shipping package endpoints, under `/api/{api_version}/settings/shipping_packages`. */
final class ShippingPackages
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List shipping packages - `GET /settings/shipping_packages`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsShippingPackages(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ShippingPackagesUrls::SETTINGS_SHIPPING_PACKAGES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsShippingPackageList::class);
    }

    /** Create a shipping package - `POST /settings/shipping_packages`; a `*_uom` is the unit's
     *  bare uuid, not its prefixed id.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsShippingPackage(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ShippingPackagesUrls::SETTINGS_SHIPPING_PACKAGES, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsShippingPackage::class);
    }

    /** Get one shipping package - `GET /settings/shipping_packages/{shipping_package_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsShippingPackage(ExsitedClient $client, int|string $shippingPackageId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ShippingPackagesUrls::SETTINGS_SHIPPING_PACKAGE, pathParams: ['shipping_package_id' => $shippingPackageId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsShippingPackage::class);
    }

    /** Delete a shipping package - `DELETE /settings/shipping_packages/{shipping_package_id}`. */
    public static function deleteSettingsShippingPackage(ExsitedClient $client, int|string $shippingPackageId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(ShippingPackagesUrls::SETTINGS_SHIPPING_PACKAGE, pathParams: ['shipping_package_id' => $shippingPackageId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update a shipping package - `PATCH /settings/shipping_packages/{shipping_package_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsShippingPackage(ExsitedClient $client, int|string $shippingPackageId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(ShippingPackagesUrls::SETTINGS_SHIPPING_PACKAGE, pathParams: ['shipping_package_id' => $shippingPackageId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsShippingPackage::class);
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
