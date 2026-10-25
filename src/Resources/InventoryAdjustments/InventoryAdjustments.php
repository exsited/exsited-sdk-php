<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\InventoryAdjustments;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Resources\InventoryAdjustments\InventoryAdjustmentsDto\InventoryAdjustment;
use Exsited\Sdk\Resources\InventoryAdjustments\InventoryAdjustmentsDto\InventoryAdjustmentList;

/** Inventory adjustment endpoints, under `/api/{api_version}`. */
final class InventoryAdjustments
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List all - `GET /inventory_adjustments`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getInventoryAdjustments(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(InventoryAdjustmentsUrls::INVENTORY_ADJUSTMENTS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: InventoryAdjustmentList::class);
    }

    /** Get single - `GET /inventory_adjustments/{inventory_adjustment_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getInventoryAdjustment(ExsitedClient $client, int|string $inventoryAdjustmentId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(InventoryAdjustmentsUrls::INVENTORY_ADJUSTMENT, pathParams: ['inventory_adjustment_id' => $inventoryAdjustmentId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: InventoryAdjustment::class);
    }
}
