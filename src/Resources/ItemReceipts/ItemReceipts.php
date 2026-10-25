<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ItemReceipts;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\ItemReceipts\ItemReceiptsDto\ItemReceipt;
use Exsited\Sdk\Resources\ItemReceipts\ItemReceiptsDto\ItemReceiptList;
use Exsited\Sdk\Resources\ItemReceipts\ItemReceiptsDto\ItemReceiptUpdated;
use Exsited\Sdk\Resources\ItemReceipts\ItemReceiptsDto\ItemReceiptsView;
use Exsited\Sdk\Resources\ItemReceipts\ItemReceiptsDto\PurchaseOrderItemReceipts;

/** Item receipt endpoints, under `/api/{api_version}`. */
final class ItemReceipts
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List item receipts - `GET /item_receipts`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getItemReceipts(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ItemReceiptsUrls::ITEM_RECEIPTS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemReceiptList::class);
    }

    /** Create item receipt - `POST /item_receipts`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createItemReceipt(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ItemReceiptsUrls::ITEM_RECEIPTS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemReceiptsView::class);
    }

    /** Update item receipt - `PATCH /item_receipts/{item_receipt_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateItemReceipt(ExsitedClient $client, int|string $itemReceiptId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(ItemReceiptsUrls::ITEM_RECEIPT, pathParams: ['item_receipt_id' => $itemReceiptId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemReceiptUpdated::class);
    }

    /** Get single - `GET /item_receipts/{item_receipt_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getItemReceipt(ExsitedClient $client, int|string $itemReceiptId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ItemReceiptsUrls::ITEM_RECEIPT, pathParams: ['item_receipt_id' => $itemReceiptId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemReceipt::class);
    }

    /** List purchase order item receipts - `GET
     *  /purchase_orders/{purchase_order_id}/item_receipts`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseOrderItemReceipts(ExsitedClient $client, int|string $purchaseOrderId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ItemReceiptsUrls::PURCHASE_ORDER_ITEM_RECEIPTS, pathParams: ['purchase_order_id' => $purchaseOrderId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseOrderItemReceipts::class);
    }

    /** Delete item receipt - `DELETE /item_receipts/{item_receipt_id}`, by its `ir_` id; refused
     *  `400` `stock_committed` once the receipt is completed. */
    public static function deleteItemReceipt(ExsitedClient $client, int|string $itemReceiptId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(ItemReceiptsUrls::ITEM_RECEIPT, pathParams: ['item_receipt_id' => $itemReceiptId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Delete item receipt note - `DELETE /item_receipts/{item_receipt_id}/notes/{note_id}`, `ir_`
     *  and `note_` ids; no route lists or creates a receipt's notes. */
    public static function deleteItemReceiptNote(ExsitedClient $client, int|string $itemReceiptId, int|string $noteId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(ItemReceiptsUrls::ITEM_RECEIPT_NOTE, pathParams: ['item_receipt_id' => $itemReceiptId, 'note_id' => $noteId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
