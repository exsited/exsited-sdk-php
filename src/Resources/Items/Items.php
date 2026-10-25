<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\Items\ItemsDto\ItemInformation;
use Exsited\Sdk\Resources\Items\ItemsDto\ItemInventories;
use Exsited\Sdk\Resources\Items\ItemsDto\ItemInventoryAdjustmentList;
use Exsited\Sdk\Resources\Items\ItemsDto\ItemList;
use Exsited\Sdk\Resources\Items\ItemsDto\ItemNote;
use Exsited\Sdk\Resources\Items\ItemsDto\ItemNoteFile;
use Exsited\Sdk\Resources\Items\ItemsDto\ItemNoteFiles;
use Exsited\Sdk\Resources\Items\ItemsDto\ItemNoteList;
use Exsited\Sdk\Resources\Items\ItemsDto\ItemPurchase;
use Exsited\Sdk\Resources\Items\ItemsDto\ItemRead;
use Exsited\Sdk\Resources\Items\ItemsDto\ItemSale;
use Exsited\Sdk\Resources\Items\ItemsDto\ItemSaleRead;
use Exsited\Sdk\Resources\Items\ItemsDto\ItemsView;

/** Item endpoints, under `/api/{api_version}/items`. */
final class Items
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List items - `GET /items`; `ItemsUrls::ITEMS_QUERY_PARAMS` shape the
     *  listing.
     *  @param array<string,mixed>|null $queryParams */
    public static function getItems(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ItemsUrls::ITEMS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemList::class);
    }

    /** Create an item - `POST /items`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createItem(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ItemsUrls::ITEMS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemsView::class);
    }

    /** Delete an item - `DELETE /items/{item_id}`. */
    public static function deleteItem(ExsitedClient $client, int|string $itemId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(ItemsUrls::ITEM, pathParams: ['item_id' => $itemId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Retrieve one item - `GET /items/{item_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getItem(ExsitedClient $client, int|string $itemId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ItemsUrls::ITEM, pathParams: ['item_id' => $itemId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemRead::class);
    }

    /** Set a bundle's components - `PATCH /items/{item_id}/bundle_details`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateItemBundleDetails(ExsitedClient $client, int|string $itemId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(ItemsUrls::ITEM_BUNDLE_DETAILS, pathParams: ['item_id' => $itemId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemRead::class);
    }

    /** Deactivate an item - `POST /items/{item_id}/deactivate`.
     *  @param array<string,mixed>|string|Dto|null $payload optional: the API needs no body, and null sends none */
    public static function deactivateItem(ExsitedClient $client, int|string $itemId, array|string|Dto|null $payload = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        if ($payload !== null) {
            self::requirePayload($payload);
        }
        return $client->sendPostRequest(ItemsUrls::ITEM_DEACTIVATE, pathParams: ['item_id' => $itemId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemRead::class);
    }

    /** List the members of an item family - `GET /items/{item_id}/family_details`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getItemFamilyDetails(ExsitedClient $client, int|string $itemId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ItemsUrls::ITEM_FAMILY_DETAILS, pathParams: ['item_id' => $itemId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemRead::class);
    }

    /** Add members to an item family - `POST /items/{item_id}/family_details`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createItemFamilyDetail(ExsitedClient $client, int|string $itemId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ItemsUrls::ITEM_FAMILY_DETAILS, pathParams: ['item_id' => $itemId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemRead::class);
    }

    /** Set the item's image - `POST /items/{item_id}/image`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function imageItem(ExsitedClient $client, int|string $itemId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ItemsUrls::ITEM_IMAGE, pathParams: ['item_id' => $itemId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemRead::class);
    }

    /** Update an item's core information - `PATCH
     *  /items/{item_id}/information`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateItemInformation(ExsitedClient $client, int|string $itemId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(ItemsUrls::ITEM_INFORMATION, pathParams: ['item_id' => $itemId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemSale::class);
    }

    /** Retrieve an item's core information - `GET /items/{item_id}/information`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getItemInformation(ExsitedClient $client, int|string $itemId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ItemsUrls::ITEM_INFORMATION, pathParams: ['item_id' => $itemId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemInformation::class);
    }

    /** Retrieve an item's inventory configuration and stock - `GET /items/{item_id}/inventories`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getItemInventories(ExsitedClient $client, int|string $itemId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ItemsUrls::ITEM_INVENTORIES, pathParams: ['item_id' => $itemId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemInventories::class);
    }

    /** Update an item's inventory configuration - `PATCH
     *  /items/{item_id}/inventories`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateItemInventories(ExsitedClient $client, int|string $itemId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(ItemsUrls::ITEM_INVENTORIES, pathParams: ['item_id' => $itemId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemSale::class);
    }

    /** List an item's inventory movements - `GET /items/{item_id}/inventory_adjustments`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getItemInventoryAdjustments(ExsitedClient $client, int|string $itemId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ItemsUrls::ITEM_INVENTORY_ADJUSTMENTS, pathParams: ['item_id' => $itemId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemInventoryAdjustmentList::class);
    }

    /** List an item's notes - `GET /items/{item_id}/notes`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getItemNotes(ExsitedClient $client, int|string $itemId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ItemsUrls::ITEM_NOTES, pathParams: ['item_id' => $itemId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemNoteList::class);
    }

    /** Attach a note to an item - `POST /items/{item_id}/notes`.
     *  Sent as a form: the text as the `note` field, with any `$files` as multipart parts.
     *  @param array<string,mixed>|null $files the file parts, as the client's `files` takes them */
    public static function createItemNote(ExsitedClient $client, int|string $itemId, string $note, ?array $files = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requireNote($note);
        return $client->sendPostRequest(ItemsUrls::ITEM_NOTES, pathParams: ['item_id' => $itemId], formData: ['note' => $note], files: $files, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemNote::class);
    }

    /** List an item's packages - `GET /items/{item_id}/package_details`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getItemPackageDetails(ExsitedClient $client, int|string $itemId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ItemsUrls::ITEM_PACKAGE_DETAILS, pathParams: ['item_id' => $itemId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemRead::class);
    }

    /** Add a package to an item - `POST /items/{item_id}/package_details`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createItemPackageDetail(ExsitedClient $client, int|string $itemId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ItemsUrls::ITEM_PACKAGE_DETAILS, pathParams: ['item_id' => $itemId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemRead::class);
    }

    /** Retrieve an item's purchase configuration - `GET /items/{item_id}/purchase`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getItemPurchase(ExsitedClient $client, int|string $itemId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ItemsUrls::ITEM_PURCHASE, pathParams: ['item_id' => $itemId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemPurchase::class);
    }

    /** Update an item's purchase configuration - `PATCH /items/{item_id}/purchase`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateItemPurchase(ExsitedClient $client, int|string $itemId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(ItemsUrls::ITEM_PURCHASE, pathParams: ['item_id' => $itemId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemSale::class);
    }

    /** Create an item's purchase configuration - `POST /items/{item_id}/purchase`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createItemPurchase(ExsitedClient $client, int|string $itemId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ItemsUrls::ITEM_PURCHASE, pathParams: ['item_id' => $itemId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemPurchase::class);
    }

    /** Reactivate a deactivated item - `POST /items/{item_id}/reactivate`.
     *  @param array<string,mixed>|string|Dto|null $payload optional: the API needs no body, and null sends none */
    public static function reactivateItem(ExsitedClient $client, int|string $itemId, array|string|Dto|null $payload = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        if ($payload !== null) {
            self::requirePayload($payload);
        }
        return $client->sendPostRequest(ItemsUrls::ITEM_REACTIVATE, pathParams: ['item_id' => $itemId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemRead::class);
    }

    /** Retrieve an item's sale configuration - `GET /items/{item_id}/sale`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getItemSale(ExsitedClient $client, int|string $itemId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ItemsUrls::ITEM_SALE, pathParams: ['item_id' => $itemId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemSaleRead::class);
    }

    /** Update an item's sale configuration - `PATCH
     *  /items/{item_id}/sale`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateItemSale(ExsitedClient $client, int|string $itemId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(ItemsUrls::ITEM_SALE, pathParams: ['item_id' => $itemId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemSale::class);
    }

    /** Create an item's sale configuration - `POST /items/{item_id}/sale`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createItemSale(ExsitedClient $client, int|string $itemId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ItemsUrls::ITEM_SALE, pathParams: ['item_id' => $itemId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemSaleRead::class);
    }

    /** Configure an item's variations - `PATCH /items/{item_id}/variations`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateItemVariations(ExsitedClient $client, int|string $itemId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(ItemsUrls::ITEM_VARIATIONS, pathParams: ['item_id' => $itemId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemRead::class);
    }

    /** Add stock to a warehouse - `POST /items/{item_id}/inventory/add`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createItemInventoryAdd(ExsitedClient $client, int|string $itemId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ItemsUrls::ITEM_INVENTORY_ADD, pathParams: ['item_id' => $itemId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemRead::class);
    }

    /** Delete one note - `DELETE /items/{item_id}/notes/{item_note_id}`. */
    public static function deleteItemNote(ExsitedClient $client, int|string $itemId, int|string $itemNoteId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(ItemsUrls::ITEM_NOTE, pathParams: ['item_id' => $itemId, 'item_note_id' => $itemNoteId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Retrieve one note - `GET /items/{item_id}/notes/{item_note_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getItemNote(ExsitedClient $client, int|string $itemId, int|string $itemNoteId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ItemsUrls::ITEM_NOTE, pathParams: ['item_id' => $itemId, 'item_note_id' => $itemNoteId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemNote::class);
    }

    /** Update a note's text - `PATCH /items/{item_id}/notes/{item_note_id}`.
     *  Sent as a form: the text as the `note` field, with any `$files` as multipart parts.
     *  @param array<string,mixed>|null $files the file parts, as the client's `files` takes them */
    public static function updateItemNote(ExsitedClient $client, int|string $itemId, int|string $itemNoteId, string $note, ?array $files = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requireNote($note);
        return $client->sendPatchRequest(ItemsUrls::ITEM_NOTE, pathParams: ['item_id' => $itemId, 'item_note_id' => $itemNoteId], formData: ['note' => $note], files: $files, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemNote::class);
    }

    /** Delete one package - `DELETE
     *  /items/{item_id}/package_details/{package_detail_id}`. */
    public static function deleteItemPackageDetail(ExsitedClient $client, int|string $itemId, int|string $packageDetailId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(ItemsUrls::ITEM_PACKAGE_DETAIL, pathParams: ['item_id' => $itemId, 'package_detail_id' => $packageDetailId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Retrieve one package - `GET
     *  /items/{item_id}/package_details/{package_detail_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getItemPackageDetail(ExsitedClient $client, int|string $itemId, int|string $packageDetailId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ItemsUrls::ITEM_PACKAGE_DETAIL, pathParams: ['item_id' => $itemId, 'package_detail_id' => $packageDetailId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemRead::class);
    }

    /** List a note's attachments - `GET
     *  /items/{item_id}/notes/{item_note_id}/files`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getItemNoteFiles(ExsitedClient $client, int|string $itemId, int|string $itemNoteId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ItemsUrls::ITEM_NOTE_FILES, pathParams: ['item_id' => $itemId, 'item_note_id' => $itemNoteId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemNoteFiles::class);
    }

    /** Retrieve one warehouse's stock for an item - `GET
     *  /items/{item_id}/warehouses/{warehouse_name}/inventories`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getItemWarehouseInventories(ExsitedClient $client, int|string $itemId, int|string $warehouseName, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ItemsUrls::ITEM_WAREHOUSE_INVENTORIES, pathParams: ['item_id' => $itemId, 'warehouse_name' => $warehouseName], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemInventories::class);
    }

    /** Retrieve one attachment - `GET
     *  /items/{item_id}/notes/{item_note_id}/files/{item_file_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getItemNoteFile(ExsitedClient $client, int|string $itemId, int|string $itemNoteId, int|string $itemFileId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ItemsUrls::ITEM_NOTE_FILE, pathParams: ['item_id' => $itemId, 'item_note_id' => $itemNoteId, 'item_file_id' => $itemFileId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemNoteFile::class);
    }

    /** Create an item's inventory section - `POST /items/{item_id}/inventories`, once, on a
     *  `STANDARD` item with sale or purchase on; `201` with the whole item.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createItemInventories(ExsitedClient $client, int|string $itemId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ItemsUrls::ITEM_INVENTORIES, pathParams: ['item_id' => $itemId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemRead::class);
    }

    /** Add stock to a warehouse - `POST /items/{item_id}/inventories/add`, `inventories` plural;
     *  the same handler as `addItemInventory`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function addItemInventories(ExsitedClient $client, int|string $itemId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ItemsUrls::ITEM_INVENTORIES_ADD, pathParams: ['item_id' => $itemId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemRead::class);
    }

    /** Create an item's inventory section - `POST /items/{item_id}/inventory`, `inventory`
     *  singular; the same handler as `createItemInventories`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createItemInventory(ExsitedClient $client, int|string $itemId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ItemsUrls::ITEM_INVENTORY, pathParams: ['item_id' => $itemId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemRead::class);
    }

    /** Delete one attachment - `DELETE /items/{item_id}/notes/{note_id}/files/{file_id}`, the
     *  `uuid` the note's files listing gives; any failure is answered `404`. */
    public static function deleteItemNoteFile(ExsitedClient $client, int|string $itemId, int|string $itemNoteId, int|string $itemFileId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(ItemsUrls::ITEM_NOTE_FILE, pathParams: ['item_id' => $itemId, 'item_note_id' => $itemNoteId, 'item_file_id' => $itemFileId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update one package - `PATCH /items/{item_id}/package_details/{package_detail_id}`, by its
     *  `uuid`; the body is `{"item": {"package_details": {...}}}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateItemPackageDetail(ExsitedClient $client, int|string $itemId, int|string $packageDetailId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(ItemsUrls::ITEM_PACKAGE_DETAIL, pathParams: ['item_id' => $itemId, 'package_detail_id' => $packageDetailId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemRead::class);
    }

    /** Retrieve an item's KPI summary - `GET /items/{item_id}/kpis`, under `item_kpis`; empty for
     *  every item, so no typed view.
     *  @param array<string,mixed>|null $queryParams */
    public static function getItemKpis(ExsitedClient $client, int|string $itemId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ItemsUrls::ITEM_KPIS, pathParams: ['item_id' => $itemId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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

    /** A blank note would be sent and stored as an empty note. */
    private static function requireNote(string $note): void
    {
        if (trim($note) === '') {
            throw new SdkUsageError(
                'note is required: the note text is the body of this request, and a blank one '
                . 'would be stored as an empty note'
            );
        }
    }
}
