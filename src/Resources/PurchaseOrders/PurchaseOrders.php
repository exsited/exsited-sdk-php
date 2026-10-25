<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseOrders;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto\PurchaseOrderInformation;
use Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto\PurchaseOrderKpis;
use Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto\PurchaseOrderLineList;
use Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto\PurchaseOrderLineRead;
use Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto\PurchaseOrderList;
use Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto\PurchaseOrderNote;
use Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto\PurchaseOrderNoteFile;
use Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto\PurchaseOrderNotes;
use Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto\PurchaseOrderNotesView;
use Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto\PurchaseOrderPurchaseInvoiceList;
use Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto\PurchaseOrderPurchaseInvoices;
use Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto\PurchaseOrderPurchasePaymentList;
use Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto\PurchaseOrderRead;
use Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto\PurchaseOrderUpdated;
use Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto\PurchaseOrdersNoteList;
use Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto\PurchaseOrdersView;

/** Purchase order endpoints, under `/api/{api_version}`. */
final class PurchaseOrders
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List purchase orders - `GET /purchase_orders`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseOrders(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseOrdersUrls::PURCHASE_ORDERS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseOrderList::class);
    }

    /** With status DRAFT - `POST /purchase_orders`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createPurchaseOrder(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(PurchaseOrdersUrls::PURCHASE_ORDERS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseOrdersView::class);
    }

    /** List all notes across POs - `GET /purchase_orders/notes`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseOrdersNotes(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseOrdersUrls::PURCHASE_ORDERS_NOTES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseOrdersNoteList::class);
    }

    /** Delete purchase order - `DELETE /purchase_orders/{purchase_order_id}`. */
    public static function deletePurchaseOrder(ExsitedClient $client, int|string $purchaseOrderId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(PurchaseOrdersUrls::PURCHASE_ORDER, pathParams: ['purchase_order_id' => $purchaseOrderId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update purchase order - `PATCH /purchase_orders/{purchase_order_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updatePurchaseOrder(ExsitedClient $client, int|string $purchaseOrderId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(PurchaseOrdersUrls::PURCHASE_ORDER, pathParams: ['purchase_order_id' => $purchaseOrderId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseOrderUpdated::class);
    }

    /** Get single - `GET /purchase_orders/{purchase_order_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseOrder(ExsitedClient $client, int|string $purchaseOrderId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseOrdersUrls::PURCHASE_ORDER, pathParams: ['purchase_order_id' => $purchaseOrderId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseOrderRead::class);
    }

    /** Cancel a purchase order - `POST
     *  /purchase_orders/{purchase_order_id}/cancel`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function cancelPurchaseOrder(ExsitedClient $client, int|string $purchaseOrderId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(PurchaseOrdersUrls::PURCHASE_ORDER_CANCEL, pathParams: ['purchase_order_id' => $purchaseOrderId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseOrderRead::class);
    }

    /** Change purchase order - `POST /purchase_orders/{purchase_order_id}/change`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function changePurchaseOrder(ExsitedClient $client, int|string $purchaseOrderId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(PurchaseOrdersUrls::PURCHASE_ORDER_CHANGE, pathParams: ['purchase_order_id' => $purchaseOrderId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseOrderRead::class);
    }

    /** The information block of one purchase order - `GET
     *  /purchase_orders/{purchase_order_id}/information`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseOrderInformation(ExsitedClient $client, int|string $purchaseOrderId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseOrdersUrls::PURCHASE_ORDER_INFORMATION, pathParams: ['purchase_order_id' => $purchaseOrderId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseOrderInformation::class);
    }

    /** The lines of one purchase order - `GET /purchase_orders/{purchase_order_id}/lines`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseOrderLines(ExsitedClient $client, int|string $purchaseOrderId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseOrdersUrls::PURCHASE_ORDER_LINES, pathParams: ['purchase_order_id' => $purchaseOrderId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseOrderLineList::class);
    }

    /** List notes - `GET /purchase_orders/{purchase_order_id}/notes`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseOrderNotes(ExsitedClient $client, int|string $purchaseOrderId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseOrdersUrls::PURCHASE_ORDER_NOTES, pathParams: ['purchase_order_id' => $purchaseOrderId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseOrderNotes::class);
    }

    /** Create note - `POST /purchase_orders/{purchase_order_id}/notes`.
     *  Sent as a form: the text as the `note` field, with any `$files` as multipart parts.
     *  @param array<string,mixed>|null $files the file parts, as the client's `files` takes them */
    public static function createPurchaseOrderNote(ExsitedClient $client, int|string $purchaseOrderId, string $note, ?array $files = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requireNote($note);
        return $client->sendPostRequest(PurchaseOrdersUrls::PURCHASE_ORDER_NOTES, pathParams: ['purchase_order_id' => $purchaseOrderId], formData: ['note' => $note], files: $files, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseOrderNotesView::class);
    }

    /** Create PI from PO - `POST
     *  /purchase_orders/{purchase_order_id}/purchase_invoices`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createPurchaseOrderPurchaseInvoice(ExsitedClient $client, int|string $purchaseOrderId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(PurchaseOrdersUrls::PURCHASE_ORDER_PURCHASE_INVOICES, pathParams: ['purchase_order_id' => $purchaseOrderId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseOrderPurchaseInvoices::class);
    }

    /** List linked invoices - `GET /purchase_orders/{purchase_order_id}/purchase_invoices`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseOrderPurchaseInvoices(ExsitedClient $client, int|string $purchaseOrderId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseOrdersUrls::PURCHASE_ORDER_PURCHASE_INVOICES, pathParams: ['purchase_order_id' => $purchaseOrderId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseOrderPurchaseInvoiceList::class);
    }

    /** List linked payments - `GET /purchase_orders/{purchase_order_id}/purchase_payments`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseOrderPurchasePayments(ExsitedClient $client, int|string $purchaseOrderId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseOrdersUrls::PURCHASE_ORDER_PURCHASE_PAYMENTS, pathParams: ['purchase_order_id' => $purchaseOrderId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseOrderPurchasePaymentList::class);
    }

    /** Reactivate a purchase order - `POST
     *  /purchase_orders/{purchase_order_id}/reactivate`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function reactivatePurchaseOrder(ExsitedClient $client, int|string $purchaseOrderId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(PurchaseOrdersUrls::PURCHASE_ORDER_REACTIVATE, pathParams: ['purchase_order_id' => $purchaseOrderId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseOrderRead::class);
    }

    /** One purchase order line - `GET
     *  /purchase_orders/{purchase_order_id}/lines/{purchase_order_line_uuid}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseOrderLine(ExsitedClient $client, int|string $purchaseOrderId, int|string $purchaseOrderLineUuid, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseOrdersUrls::PURCHASE_ORDER_LINE, pathParams: ['purchase_order_id' => $purchaseOrderId, 'purchase_order_line_uuid' => $purchaseOrderLineUuid], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseOrderLineRead::class);
    }

    /** Delete note - `DELETE
     *  /purchase_orders/{purchase_order_id}/notes/{purchase_order_note_id}`. */
    public static function deletePurchaseOrderNote(ExsitedClient $client, int|string $purchaseOrderId, int|string $purchaseOrderNoteId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(PurchaseOrdersUrls::PURCHASE_ORDER_NOTE, pathParams: ['purchase_order_id' => $purchaseOrderId, 'purchase_order_note_id' => $purchaseOrderNoteId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Get specific note - `GET
     *  /purchase_orders/{purchase_order_id}/notes/{purchase_order_note_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseOrderNote(ExsitedClient $client, int|string $purchaseOrderId, int|string $purchaseOrderNoteId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseOrdersUrls::PURCHASE_ORDER_NOTE, pathParams: ['purchase_order_id' => $purchaseOrderId, 'purchase_order_note_id' => $purchaseOrderNoteId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseOrderNote::class);
    }

    /** List note files - `GET /purchase_orders/{purchase_order_id}/notes/{purchase_order_note_i
     *  d}/files`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseOrderNoteFiles(ExsitedClient $client, int|string $purchaseOrderId, int|string $purchaseOrderNoteId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseOrdersUrls::PURCHASE_ORDER_NOTE_FILES, pathParams: ['purchase_order_id' => $purchaseOrderId, 'purchase_order_note_id' => $purchaseOrderNoteId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseOrderNote::class);
    }

    /** Get note file - `GET
     *  /purchase_orders/{purchase_order_id}/notes/{purchase_order_note_i
     *  d}/files/{purchase_order_file_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseOrderNoteFile(ExsitedClient $client, int|string $purchaseOrderId, int|string $purchaseOrderNoteId, int|string $purchaseOrderFileId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseOrdersUrls::PURCHASE_ORDER_NOTE_FILE, pathParams: ['purchase_order_id' => $purchaseOrderId, 'purchase_order_note_id' => $purchaseOrderNoteId, 'purchase_order_file_id' => $purchaseOrderFileId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseOrderNoteFile::class);
    }

    /** A purchase order's KPI block - `GET /purchase_orders/{purchase_order_id}/kpis`, under
     *  `purchase_order_kpis`; the same block `getPurchaseOrder` carries as `kpis`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseOrderKpis(ExsitedClient $client, int|string $purchaseOrderId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseOrdersUrls::PURCHASE_ORDER_KPIS, pathParams: ['purchase_order_id' => $purchaseOrderId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseOrderKpis::class);
    }

    /** Delete one attachment - `DELETE
     *  /purchase_orders/{purchase_order_id}/notes/{purchase_order_note_id}/files/{purchase_order_file_id}`,
     *  by the purchase order's code and the attachment's `uuid`; `204`. */
    public static function deletePurchaseOrderNoteFile(ExsitedClient $client, int|string $purchaseOrderId, int|string $purchaseOrderNoteId, int|string $purchaseOrderFileId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(PurchaseOrdersUrls::PURCHASE_ORDER_NOTE_FILE, pathParams: ['purchase_order_id' => $purchaseOrderId, 'purchase_order_note_id' => $purchaseOrderNoteId, 'purchase_order_file_id' => $purchaseOrderFileId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
