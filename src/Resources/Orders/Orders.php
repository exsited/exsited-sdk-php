<?php

declare(strict_types=1);

namespace Exsited\Resources\Orders;

use Exsited\Client\ApiResponse;
use Exsited\Client\Dto;
use Exsited\Client\ExsitedClient;
use Exsited\Errors\SdkUsageError;
use Exsited\Resources\Orders\OrdersDto\AccountOrders;
use Exsited\Resources\Orders\OrdersDto\OrderBillingPreferences;
use Exsited\Resources\Orders\OrdersDto\OrderCustomObject;
use Exsited\Resources\Orders\OrdersDto\OrderDiscardDraft;
use Exsited\Resources\Orders\OrdersDto\OrderExtendTrial;
use Exsited\Resources\Orders\OrdersDto\OrderInformation;
use Exsited\Resources\Orders\OrdersDto\OrderItemFulfillment;
use Exsited\Resources\Orders\OrdersDto\OrderKpis;
use Exsited\Resources\Orders\OrdersDto\OrderLine;
use Exsited\Resources\Orders\OrdersDto\OrderList;
use Exsited\Resources\Orders\OrdersDto\OrderNoteFile;
use Exsited\Resources\Orders\OrdersDto\OrderNoteFileList;
use Exsited\Resources\Orders\OrdersDto\OrderNoteList;
use Exsited\Resources\Orders\OrdersDto\OrderNoteView;
use Exsited\Resources\Orders\OrdersDto\OrderPayment;
use Exsited\Resources\Orders\OrdersDto\OrderPaymentMethod;
use Exsited\Resources\Orders\OrdersDto\OrderPaymentMethods;
use Exsited\Resources\Orders\OrdersDto\OrderPdf;
use Exsited\Resources\Orders\OrdersDto\OrderQuotePartialInvoices;
use Exsited\Resources\Orders\OrdersDto\OrderRead;

/** Order endpoints, under `/api/{api_version}`. */
final class Orders
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List of all orders - `GET /orders`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getOrders(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OrdersUrls::ORDERS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderList::class);
    }

    /** Create order - `POST /orders`; answered `201`. A contract needs a recurring or metered
     *  item on a line.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createOrder(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(OrdersUrls::ORDERS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderRead::class);
    }

    /** Order details - `GET /orders/{order_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getOrder(ExsitedClient $client, int|string $orderId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OrdersUrls::ORDER, pathParams: ['order_id' => $orderId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderRead::class);
    }

    /** Delete order - `DELETE /orders/{order_id}`. */
    public static function deleteOrder(ExsitedClient $client, int|string $orderId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(OrdersUrls::ORDER, pathParams: ['order_id' => $orderId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Activate order - `POST /orders/{order_id}/activate`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function activateOrder(ExsitedClient $client, int|string $orderId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(OrdersUrls::ORDER_ACTIVATE, pathParams: ['order_id' => $orderId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Activate draft order - `POST /orders/{order_id}/activate_draft`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createOrderActivateDraft(ExsitedClient $client, int|string $orderId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(OrdersUrls::ORDER_ACTIVATE_DRAFT, pathParams: ['order_id' => $orderId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderRead::class);
    }

    /** Billing preferences - `GET /orders/{order_id}/billing_preferences`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getOrderBillingPreferences(ExsitedClient $client, int|string $orderId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OrdersUrls::ORDER_BILLING_PREFERENCES, pathParams: ['order_id' => $orderId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderBillingPreferences::class);
    }

    /** Update billing preferences - `PATCH /orders/{order_id}/billing_preferences`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateOrderBillingPreferences(ExsitedClient $client, int|string $orderId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(OrdersUrls::ORDER_BILLING_PREFERENCES, pathParams: ['order_id' => $orderId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderRead::class);
    }

    /** Replace billing preferences - `PUT /orders/{order_id}/billing_preferences`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function replaceOrderBillingPreferences(ExsitedClient $client, int|string $orderId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPutRequest(OrdersUrls::ORDER_BILLING_PREFERENCES, pathParams: ['order_id' => $orderId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderRead::class);
    }

    /** Cancel order - `POST /orders/{order_id}/cancel`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function cancelOrder(ExsitedClient $client, int|string $orderId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(OrdersUrls::ORDER_CANCEL, pathParams: ['order_id' => $orderId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderRead::class);
    }

    /** Change order - `POST /orders/{order_id}/change`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function changeOrder(ExsitedClient $client, int|string $orderId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(OrdersUrls::ORDER_CHANGE, pathParams: ['order_id' => $orderId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderRead::class);
    }

    /** Convert quote order - `POST /orders/{order_id}/convert_to_order`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createOrderConvertToOrder(ExsitedClient $client, int|string $orderId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(OrdersUrls::ORDER_CONVERT_TO_ORDER, pathParams: ['order_id' => $orderId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderRead::class);
    }

    /** List custom objects - `GET /orders/{order_id}/custom_objects`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getOrderCustomObjects(ExsitedClient $client, int|string $orderId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OrdersUrls::ORDER_CUSTOM_OBJECTS, pathParams: ['order_id' => $orderId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountOrders::class);
    }

    /** List custom object instances - `GET /orders/{order_id}/custom_objects_instances`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getOrderCustomObjectsInstances(ExsitedClient $client, int|string $orderId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OrdersUrls::ORDER_CUSTOM_OBJECTS_INSTANCES, pathParams: ['order_id' => $orderId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountOrders::class);
    }

    /** Discard draft order - `POST /orders/{order_id}/discard_draft`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createOrderDiscardDraft(ExsitedClient $client, int|string $orderId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(OrdersUrls::ORDER_DISCARD_DRAFT, pathParams: ['order_id' => $orderId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderDiscardDraft::class);
    }

    /** Extend trial - `POST /orders/{order_id}/extend_trial`; the new window starts after the
     *  current trial ends.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createOrderExtendTrial(ExsitedClient $client, int|string $orderId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(OrdersUrls::ORDER_EXTEND_TRIAL, pathParams: ['order_id' => $orderId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderExtendTrial::class);
    }

    /** Order information - `GET /orders/{order_id}/information`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getOrderInformation(ExsitedClient $client, int|string $orderId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OrdersUrls::ORDER_INFORMATION, pathParams: ['order_id' => $orderId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderInformation::class);
    }

    /** Update order information - `PATCH /orders/{order_id}/information`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateOrderInformation(ExsitedClient $client, int|string $orderId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(OrdersUrls::ORDER_INFORMATION, pathParams: ['order_id' => $orderId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderRead::class);
    }

    /** List fulfillments - `GET /orders/{order_id}/item_fulfillments`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getOrderItemFulfillments(ExsitedClient $client, int|string $orderId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OrdersUrls::ORDER_ITEM_FULFILLMENTS, pathParams: ['order_id' => $orderId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountOrders::class);
    }

    /** List of order lines - `GET /orders/{order_id}/lines`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getOrderLines(ExsitedClient $client, int|string $orderId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OrdersUrls::ORDER_LINES, pathParams: ['order_id' => $orderId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderRead::class);
    }

    /** List notes - `GET /orders/{order_id}/notes`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getOrderNotes(ExsitedClient $client, int|string $orderId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OrdersUrls::ORDER_NOTES, pathParams: ['order_id' => $orderId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderNoteList::class);
    }

    /** Create note - `POST /orders/{order_id}/notes`.
     *  Sent as a form: the text as the `note` field, with any `$files` as multipart parts.
     *  @param array<string,mixed>|null $files the file parts, as the client's `files` takes them */
    public static function createOrderNote(ExsitedClient $client, int|string $orderId, string $note, ?array $files = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requireNote($note);
        return $client->sendPostRequest(OrdersUrls::ORDER_NOTES, pathParams: ['order_id' => $orderId], formData: ['note' => $note], files: $files, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderNoteView::class);
    }

    /** List order payment methods - `GET /orders/{order_id}/payment_methods`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getOrderPaymentMethods(ExsitedClient $client, int|string $orderId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OrdersUrls::ORDER_PAYMENT_METHODS, pathParams: ['order_id' => $orderId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderPaymentMethods::class);
    }

    /** Order PDF - `GET /orders/{order_id}/pdf`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getOrderPdf(ExsitedClient $client, int|string $orderId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OrdersUrls::ORDER_PDF, pathParams: ['order_id' => $orderId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderPdf::class);
    }

    /** Reactivate order - `POST /orders/{order_id}/reactivate`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function reactivateOrder(ExsitedClient $client, int|string $orderId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(OrdersUrls::ORDER_REACTIVATE, pathParams: ['order_id' => $orderId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderRead::class);
    }

    /** Pre-order relinquish - `POST /orders/{order_id}/relinquish`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createOrderRelinquish(ExsitedClient $client, int|string $orderId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(OrdersUrls::ORDER_RELINQUISH, pathParams: ['order_id' => $orderId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderRead::class);
    }

    /** Update line information - `PATCH /orders/{order_id}/lines/{line_uuid}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateOrderLine(ExsitedClient $client, int|string $orderId, int|string $lineUuid, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(OrdersUrls::ORDER_LINE, pathParams: ['order_id' => $orderId, 'line_uuid' => $lineUuid], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderRead::class);
    }

    /** Single line details - `GET /orders/{order_id}/lines/{line_uuid}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getOrderLine(ExsitedClient $client, int|string $orderId, int|string $lineUuid, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OrdersUrls::ORDER_LINE, pathParams: ['order_id' => $orderId, 'line_uuid' => $lineUuid], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderLine::class);
    }

    /** Delete note - `DELETE /orders/{order_id}/notes/{order_note_id}`. */
    public static function deleteOrderNote(ExsitedClient $client, int|string $orderId, int|string $orderNoteId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(OrdersUrls::ORDER_NOTE, pathParams: ['order_id' => $orderId, 'order_note_id' => $orderNoteId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Get specific note - `GET /orders/{order_id}/notes/{order_note_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getOrderNote(ExsitedClient $client, int|string $orderId, int|string $orderNoteId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OrdersUrls::ORDER_NOTE, pathParams: ['order_id' => $orderId, 'order_note_id' => $orderNoteId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderNoteView::class);
    }

    /** Update note - `PATCH /orders/{order_id}/notes/{order_note_id}`.
     *  Sent as a form: the text as the `note` field, with any `$files` as multipart parts.
     *  @param array<string,mixed>|null $files the file parts, as the client's `files` takes them */
    public static function updateOrderNote(ExsitedClient $client, int|string $orderId, int|string $orderNoteId, string $note, ?array $files = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requireNote($note);
        return $client->sendPatchRequest(OrdersUrls::ORDER_NOTE, pathParams: ['order_id' => $orderId, 'order_note_id' => $orderNoteId], formData: ['note' => $note], files: $files, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderNoteView::class);
    }

    /** Get single - `GET /orders/{order_id}/payment_methods/{payment_method_ref}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getOrderPaymentMethod(ExsitedClient $client, int|string $orderId, int|string $paymentMethodRef, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OrdersUrls::ORDER_PAYMENT_METHOD, pathParams: ['order_id' => $orderId, 'payment_method_ref' => $paymentMethodRef], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderPaymentMethod::class);
    }

    /** Update line billing preferences - `PATCH
     *  /orders/{order_id}/lines/{line_uuid}/billing_preferences`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateOrderLineBillingPreferences(ExsitedClient $client, int|string $orderId, int|string $lineUuid, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(OrdersUrls::ORDER_LINE_BILLING_PREFERENCES, pathParams: ['order_id' => $orderId, 'line_uuid' => $lineUuid], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderRead::class);
    }

    /** Update line billing preferences - `PUT
     *  /orders/{order_id}/lines/{line_uuid}/billing_preferences`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function replaceOrderLineBillingPreferences(ExsitedClient $client, int|string $orderId, int|string $lineUuid, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPutRequest(OrdersUrls::ORDER_LINE_BILLING_PREFERENCES, pathParams: ['order_id' => $orderId, 'line_uuid' => $lineUuid], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderRead::class);
    }

    /** List note files - `GET /orders/{order_id}/notes/{order_note_id}/files`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getOrderNoteFiles(ExsitedClient $client, int|string $orderId, int|string $orderNoteId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OrdersUrls::ORDER_NOTE_FILES, pathParams: ['order_id' => $orderId, 'order_note_id' => $orderNoteId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderNoteFileList::class);
    }

    /** Get note file - `GET /orders/{order_id}/notes/{order_note_id}/files/{order_file_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getOrderNoteFile(ExsitedClient $client, int|string $orderId, int|string $orderNoteId, int|string $orderFileId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OrdersUrls::ORDER_NOTE_FILE, pathParams: ['order_id' => $orderId, 'order_note_id' => $orderNoteId, 'order_file_id' => $orderFileId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderNoteFile::class);
    }

    /** List the notes of every order - `GET /orders/notes`; not scoped to one order.
     *  @param array<string,mixed>|null $queryParams */
    public static function getOrdersNotes(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OrdersUrls::ORDERS_NOTES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderNoteList::class);
    }

    /** Price an order without creating it - `POST /orders/preview`, the `createOrder` body; `201`,
     *  with no cart data in the answer. An `account` object still creates that account.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function previewOrder(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(OrdersUrls::ORDERS_PREVIEW, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Create an order, and its invoice and payment if the body nests them, in one call - `POST
     *  /orders/express`, the `createExpress` body under `account`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createOrderExpress(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(OrdersUrls::ORDERS_EXPRESS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Accept an order's pending acceptance - `POST /orders/{order_id}/accept`; no body sent. It
     *  raises an invoice and may require payment. */
    public static function acceptOrder(ExsitedClient $client, int|string $orderId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendPostRequest(OrdersUrls::ORDER_ACCEPT, pathParams: ['order_id' => $orderId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Activate a dormant invoice - `POST /orders/{order_id}/activate_invoice_from_dormant/
     *  {invoice_uuid}`, body under `activate`: `due_date`, `amount`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function activateOrderInvoiceFromDormant(ExsitedClient $client, int|string $orderId, int|string $invoiceUuid, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(OrdersUrls::ORDER_ACTIVATE_INVOICE_FROM_DORMANT, pathParams: ['order_id' => $orderId, 'invoice_uuid' => $invoiceUuid], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Preview a change - `POST /orders/{order_id}/change/preview`, the `changeOrder` body;
     *  nothing is changed, and the answer is the order as it stands.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function previewOrderChange(ExsitedClient $client, int|string $orderId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(OrdersUrls::ORDER_CHANGE_PREVIEW, pathParams: ['order_id' => $orderId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderRead::class);
    }

    /** Trigger a workflow state - `POST /orders/{order_id}/change_status`, body
     *  `order.workflow_status`; it runs the workflow's connections.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function changeOrderStatus(ExsitedClient $client, int|string $orderId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(OrdersUrls::ORDER_CHANGE_STATUS, pathParams: ['order_id' => $orderId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Upgrade or downgrade by package rank - `POST /orders/{order_id}/contract_adjustment`; the
     *  body is not wrapped: `effective_date` and `lines`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function adjustOrderContract(ExsitedClient $client, int|string $orderId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(OrdersUrls::ORDER_CONTRACT_ADJUSTMENT, pathParams: ['order_id' => $orderId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Preview a contract adjustment - `POST /orders/{order_id}/contract_adjustment/preview`, the
     *  `adjustOrderContract` body, not wrapped.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function previewOrderContractAdjustment(ExsitedClient $client, int|string $orderId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(OrdersUrls::ORDER_CONTRACT_ADJUSTMENT_PREVIEW, pathParams: ['order_id' => $orderId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Downgrade a contract - `POST /orders/{order_id}/downgrade`; the body is not wrapped:
     *  `effective_date` and `lines` naming each `charge_item_uuid` and `package_name`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function downgradeOrder(ExsitedClient $client, int|string $orderId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(OrdersUrls::ORDER_DOWNGRADE, pathParams: ['order_id' => $orderId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Preview a downgrade - `POST /orders/{order_id}/downgrade/preview`, the `downgradeOrder`
     *  body, not wrapped.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function previewOrderDowngrade(ExsitedClient $client, int|string $orderId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(OrdersUrls::ORDER_DOWNGRADE_PREVIEW, pathParams: ['order_id' => $orderId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Upgrade a contract - `POST /orders/{order_id}/upgrade`; the body is not wrapped:
     *  `effective_date` and `lines` naming each `charge_item_uuid` and `package_name`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function upgradeOrder(ExsitedClient $client, int|string $orderId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(OrdersUrls::ORDER_UPGRADE, pathParams: ['order_id' => $orderId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Preview an upgrade - `POST /orders/{order_id}/upgrade/preview`, the `upgradeOrder` body,
     *  not wrapped.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function previewOrderUpgrade(ExsitedClient $client, int|string $orderId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(OrdersUrls::ORDER_UPGRADE_PREVIEW, pathParams: ['order_id' => $orderId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** End a contract's trial now - `POST /orders/{order_id}/terminate_trial`; no body sent. It
     *  starts the contract. */
    public static function terminateOrderTrial(ExsitedClient $client, int|string $orderId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendPostRequest(OrdersUrls::ORDER_TERMINATE_TRIAL, pathParams: ['order_id' => $orderId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Delete a note attachment - `DELETE
     *  /orders/{order_id}/notes/{order_note_id}/files/{order_file_id}`; `204`. */
    public static function deleteOrderNoteFile(ExsitedClient $client, int|string $orderId, int|string $orderNoteId, int|string $orderFileId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(OrdersUrls::ORDER_NOTE_FILE, pathParams: ['order_id' => $orderId, 'order_note_id' => $orderNoteId, 'order_file_id' => $orderFileId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** One custom object with the order's instances of it - `GET
     *  /orders/{order_id}/custom_objects/{custom_object_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getOrderCustomObject(ExsitedClient $client, int|string $orderId, int|string $customObjectId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OrdersUrls::ORDER_CUSTOM_OBJECT, pathParams: ['order_id' => $orderId, 'custom_object_id' => $customObjectId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderCustomObject::class);
    }

    /** One custom object instance - `GET
     *  /orders/{order_id}/custom_objects/{custom_object_id}/instances/{instance_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getOrderCustomObjectInstance(ExsitedClient $client, int|string $orderId, int|string $customObjectId, int|string $instanceId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OrdersUrls::ORDER_CUSTOM_OBJECT_INSTANCE, pathParams: ['order_id' => $orderId, 'custom_object_id' => $customObjectId, 'instance_id' => $instanceId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** The server's alias of `getOrderCustomObject` - `GET
     *  /orders/{order_id}/custom_objects_instances/{custom_object_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getOrderCustomObjectsInstance(ExsitedClient $client, int|string $orderId, int|string $customObjectId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OrdersUrls::ORDER_CUSTOM_OBJECTS_INSTANCE, pathParams: ['order_id' => $orderId, 'custom_object_id' => $customObjectId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderCustomObject::class);
    }

    /** The server's alias of `getOrderCustomObjectInstance` - `GET /orders/{order_id}/
     *  custom_objects_instances/{custom_object_id}/instances/{instance_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getOrderCustomObjectsInstanceInstance(ExsitedClient $client, int|string $orderId, int|string $customObjectId, int|string $instanceId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OrdersUrls::ORDER_CUSTOM_OBJECTS_INSTANCE_INSTANCE, pathParams: ['order_id' => $orderId, 'custom_object_id' => $customObjectId, 'instance_id' => $instanceId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** One fulfillment - `GET /orders/{order_id}/item_fulfillments/{fulfillment_id}`; the server
     *  does not check that the fulfillment belongs to the order.
     *  @param array<string,mixed>|null $queryParams */
    public static function getOrderItemFulfillment(ExsitedClient $client, int|string $orderId, int|string $fulfillmentId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OrdersUrls::ORDER_ITEM_FULFILLMENT, pathParams: ['order_id' => $orderId, 'fulfillment_id' => $fulfillmentId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderItemFulfillment::class);
    }

    /** An order's KPIs - `GET /orders/{order_id}/kpis`, under `order_kpis`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getOrderKpis(ExsitedClient $client, int|string $orderId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OrdersUrls::ORDER_KPIS, pathParams: ['order_id' => $orderId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderKpis::class);
    }

    /** One payment - `GET /orders/{order_id}/payments/{payment_id}`; the server does not check
     *  that the payment belongs to the order.
     *  @param array<string,mixed>|null $queryParams */
    public static function getOrderPayment(ExsitedClient $client, int|string $orderId, int|string $paymentId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OrdersUrls::ORDER_PAYMENT, pathParams: ['order_id' => $orderId, 'payment_id' => $paymentId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderPayment::class);
    }

    /** The deposit and instalment invoices of a converted quote - `GET
     *  /orders/{order_id}/quote_partial_invoices`; an unconverted quote answers `400`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getOrderQuotePartialInvoices(ExsitedClient $client, int|string $orderId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OrdersUrls::ORDER_QUOTE_PARTIAL_INVOICES, pathParams: ['order_id' => $orderId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: OrderQuotePartialInvoices::class);
    }

    /** A shipping line's PDF - `GET /orders/{order_id}/shipping_pdf/{shipping_line_id}`; `404`
     *  until the line has a generated shipping PDF.
     *  @param array<string,mixed>|null $queryParams */
    public static function getOrderShippingPdf(ExsitedClient $client, int|string $orderId, int|string $shippingLineId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OrdersUrls::ORDER_SHIPPING_PDF, pathParams: ['order_id' => $orderId, 'shipping_line_id' => $shippingLineId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
