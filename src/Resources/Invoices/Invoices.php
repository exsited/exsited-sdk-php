<?php

declare(strict_types=1);

namespace Exsited\Resources\Invoices;

use Exsited\Client\ApiResponse;
use Exsited\Client\Dto;
use Exsited\Client\ExsitedClient;
use Exsited\Errors\SdkUsageError;
use Exsited\Resources\Invoices\InvoicesDto\AccountInvoices;
use Exsited\Resources\Invoices\InvoicesDto\CreditNoteApplicationRead;
use Exsited\Resources\Invoices\InvoicesDto\InvoiceDeleted;
use Exsited\Resources\Invoices\InvoicesDto\InvoiceInformation;
use Exsited\Resources\Invoices\InvoicesDto\InvoiceInformationRead;
use Exsited\Resources\Invoices\InvoicesDto\InvoiceItemFulfillment;
use Exsited\Resources\Invoices\InvoicesDto\InvoiceItemFulfillmentList;
use Exsited\Resources\Invoices\InvoicesDto\InvoiceKpisRead;
use Exsited\Resources\Invoices\InvoicesDto\InvoiceLineRead;
use Exsited\Resources\Invoices\InvoicesDto\InvoiceLines;
use Exsited\Resources\Invoices\InvoicesDto\InvoiceList;
use Exsited\Resources\Invoices\InvoicesDto\InvoiceNote;
use Exsited\Resources\Invoices\InvoicesDto\InvoiceNoteList;
use Exsited\Resources\Invoices\InvoicesDto\InvoiceNoteRead;
use Exsited\Resources\Invoices\InvoicesDto\InvoicePdf;
use Exsited\Resources\Invoices\InvoicesDto\InvoiceReactivate;
use Exsited\Resources\Invoices\InvoicesDto\InvoiceRead;
use Exsited\Resources\Invoices\InvoicesDto\InvoiceReturnMerchandiseAuthorisation;
use Exsited\Resources\Invoices\InvoicesDto\InvoicesView;

/** Invoice endpoints, under `/api/{api_version}`. */
final class Invoices
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List invoices - `GET /invoices`; `InvoicesUrls::INVOICES_QUERY_PARAMS` shape the listing.
     *  @param array<string,mixed>|null $queryParams */
    public static function getInvoices(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(InvoicesUrls::INVOICES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: InvoiceList::class);
    }

    /** Create an invoice - `POST /invoices`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createInvoice(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(InvoicesUrls::INVOICES, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: InvoicesView::class);
    }

    /** Delete an invoice - `DELETE /invoices/{invoice_id}`. */
    public static function deleteInvoice(ExsitedClient $client, int|string $invoiceId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(InvoicesUrls::INVOICE, pathParams: ['invoice_id' => $invoiceId], raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: InvoiceDeleted::class);
    }

    /** Retrieve one invoice - `GET /invoices/{invoice_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getInvoice(ExsitedClient $client, int|string $invoiceId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(InvoicesUrls::INVOICE, pathParams: ['invoice_id' => $invoiceId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: InvoiceRead::class);
    }

    /** Amend an invoice - `POST /invoices/{invoice_id}/amend`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function amendInvoice(ExsitedClient $client, int|string $invoiceId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(InvoicesUrls::INVOICE_AMEND, pathParams: ['invoice_id' => $invoiceId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: InvoicesView::class);
    }

    /** Cancel an invoice - `POST /invoices/{invoice_id}/cancel`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function cancelInvoice(ExsitedClient $client, int|string $invoiceId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(InvoicesUrls::INVOICE_CANCEL, pathParams: ['invoice_id' => $invoiceId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: InvoicesView::class);
    }

    /** Update an invoice's core information - `PATCH
     *  /invoices/{invoice_id}/information`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateInvoiceInformation(ExsitedClient $client, int|string $invoiceId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(InvoicesUrls::INVOICE_INFORMATION, pathParams: ['invoice_id' => $invoiceId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: InvoiceInformation::class);
    }

    /** Retrieve an invoice's core information - `GET /invoices/{invoice_id}/information`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getInvoiceInformation(ExsitedClient $client, int|string $invoiceId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(InvoicesUrls::INVOICE_INFORMATION, pathParams: ['invoice_id' => $invoiceId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: InvoiceInformationRead::class);
    }

    /** List the fulfilments against an invoice - `GET /invoices/{invoice_id}/item_fulfillments`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getInvoiceItemFulfillments(ExsitedClient $client, int|string $invoiceId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(InvoicesUrls::INVOICE_ITEM_FULFILLMENTS, pathParams: ['invoice_id' => $invoiceId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: InvoiceItemFulfillmentList::class);
    }

    /** List an invoice's notes - `GET /invoices/{invoice_id}/notes`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getInvoiceNotes(ExsitedClient $client, int|string $invoiceId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(InvoicesUrls::INVOICE_NOTES, pathParams: ['invoice_id' => $invoiceId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: InvoiceNoteList::class);
    }

    /** Attach a note to an invoice - `POST /invoices/{invoice_id}/notes`.
     *  Sent as a form: the text as the `note` field, with any `$files` as multipart parts.
     *  @param array<string,mixed>|null $files the file parts, as the client's `files` takes them */
    public static function createInvoiceNote(ExsitedClient $client, int|string $invoiceId, string $note, ?array $files = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requireNote($note);
        return $client->sendPostRequest(InvoicesUrls::INVOICE_NOTES, pathParams: ['invoice_id' => $invoiceId], formData: ['note' => $note], files: $files, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: InvoiceNote::class);
    }

    /** Ask for the invoice's PDF - `GET /invoices/{invoice_id}/pdf`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getInvoicePdf(ExsitedClient $client, int|string $invoiceId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(InvoicesUrls::INVOICE_PDF, pathParams: ['invoice_id' => $invoiceId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: InvoicePdf::class);
    }

    /** Reactivate a cancelled invoice - `POST /invoices/{invoice_id}/reactivate`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function reactivateInvoice(ExsitedClient $client, int|string $invoiceId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(InvoicesUrls::INVOICE_REACTIVATE, pathParams: ['invoice_id' => $invoiceId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: InvoiceReactivate::class);
    }

    /** List an invoice's return merchandise authorisations - `GET
     *  /invoices/{invoice_id}/return_merchandise_authorisations`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getInvoiceReturnMerchandiseAuthorisations(ExsitedClient $client, int|string $invoiceId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(InvoicesUrls::INVOICE_RETURN_MERCHANDISE_AUTHORISATIONS, pathParams: ['invoice_id' => $invoiceId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountInvoices::class);
    }

    /** List one order's invoices - `GET /orders/{order_id}/invoices`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getOrderInvoices(ExsitedClient $client, int|string $orderId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(InvoicesUrls::ORDER_INVOICES, pathParams: ['order_id' => $orderId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: InvoiceList::class);
    }

    /** Raise an invoice against an order - `POST /orders/{order_id}/invoices`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createOrderInvoice(ExsitedClient $client, int|string $orderId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(InvoicesUrls::ORDER_INVOICES, pathParams: ['order_id' => $orderId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: InvoicesView::class);
    }

    /** Retrieve one fulfilment - `GET /invoices/{invoice_id}/item_fulfillments/{fulfillment_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getInvoiceItemFulfillment(ExsitedClient $client, int|string $invoiceId, int|string $fulfillmentId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(InvoicesUrls::INVOICE_ITEM_FULFILLMENT, pathParams: ['invoice_id' => $invoiceId, 'fulfillment_id' => $fulfillmentId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: InvoiceItemFulfillment::class);
    }

    /** Retrieve one note - `GET /invoices/{invoice_id}/notes/{invoice_note_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getInvoiceNote(ExsitedClient $client, int|string $invoiceId, int|string $invoiceNoteId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(InvoicesUrls::INVOICE_NOTE, pathParams: ['invoice_id' => $invoiceId, 'invoice_note_id' => $invoiceNoteId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: InvoiceNoteRead::class);
    }

    /** Delete one note - `DELETE
     *  /invoices/{invoice_id}/notes/{invoice_note_id}`. */
    public static function deleteInvoiceNote(ExsitedClient $client, int|string $invoiceId, int|string $invoiceNoteId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(InvoicesUrls::INVOICE_NOTE, pathParams: ['invoice_id' => $invoiceId, 'invoice_note_id' => $invoiceNoteId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Retrieve one return merchandise authorisation - `GET
     *  /invoices/{invoice_id}/return_merchandise_authorisations/{rma_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getInvoiceReturnMerchandiseAuthorisation(ExsitedClient $client, int|string $invoiceId, int|string $rmaId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(InvoicesUrls::INVOICE_RETURN_MERCHANDISE_AUTHORISATION, pathParams: ['invoice_id' => $invoiceId, 'rma_id' => $rmaId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: InvoiceReturnMerchandiseAuthorisation::class);
    }

    /** List a note's attachments - `GET /invoices/{invoice_id}/notes/{invoice_note_id}/files`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getInvoiceNoteFiles(ExsitedClient $client, int|string $invoiceId, int|string $invoiceNoteId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(InvoicesUrls::INVOICE_NOTE_FILES, pathParams: ['invoice_id' => $invoiceId, 'invoice_note_id' => $invoiceNoteId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: InvoiceNoteRead::class);
    }

    /** Retrieve one attachment - `GET
     *  /invoices/{invoice_id}/notes/{invoice_note_id}/files/{invoice_fil e_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getInvoiceNoteFile(ExsitedClient $client, int|string $invoiceId, int|string $invoiceNoteId, int|string $invoiceFileId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(InvoicesUrls::INVOICE_NOTE_FILE, pathParams: ['invoice_id' => $invoiceId, 'invoice_note_id' => $invoiceNoteId, 'invoice_file_id' => $invoiceFileId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: InvoiceNoteRead::class);
    }

    /** An invoice's KPI block - `GET /invoices/{invoice_id}/kpis`, under `invoice_kpis`; the same
     *  block `getInvoice` carries as `kpis`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getInvoiceKpis(ExsitedClient $client, int|string $invoiceId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(InvoicesUrls::INVOICE_KPIS, pathParams: ['invoice_id' => $invoiceId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: InvoiceKpisRead::class);
    }

    /** An invoice's lines - `GET /invoices/{invoice_id}/lines`, under `invoice.lines`; not a paged
     *  listing.
     *  @param array<string,mixed>|null $queryParams */
    public static function getInvoiceLines(ExsitedClient $client, int|string $invoiceId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(InvoicesUrls::INVOICE_LINES, pathParams: ['invoice_id' => $invoiceId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: InvoiceLines::class);
    }

    /** One invoice line - `GET /invoices/{invoice_id}/lines/{line_id}`, under `invoice.line`. The
     *  server ignores `line_id` and answers the invoice's first line.
     *  @param array<string,mixed>|null $queryParams */
    public static function getInvoiceLine(ExsitedClient $client, int|string $invoiceId, int|string $lineId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(InvoicesUrls::INVOICE_LINE, pathParams: ['invoice_id' => $invoiceId, 'line_id' => $lineId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: InvoiceLineRead::class);
    }

    /** One credit note application through an invoice - `GET
     *  /invoices/{invoice_id}/credit_note_applications/{credit_note_application_id}`; not checked
     *  against the invoice, so any application answers under any invoice.
     *  @param array<string,mixed>|null $queryParams */
    public static function getInvoiceCreditNoteApplication(ExsitedClient $client, int|string $invoiceId, int|string $creditNoteApplicationId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(InvoicesUrls::INVOICE_CREDIT_NOTE_APPLICATION, pathParams: ['invoice_id' => $invoiceId, 'credit_note_application_id' => $creditNoteApplicationId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: CreditNoteApplicationRead::class);
    }

    /** The custom objects defined for invoices - `GET /invoices/{invoice_id}/custom_objects`; a
     *  paged listing, under `data`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getInvoiceCustomObjects(ExsitedClient $client, int|string $invoiceId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(InvoicesUrls::INVOICE_CUSTOM_OBJECTS, pathParams: ['invoice_id' => $invoiceId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** One custom object with this invoice's instances of it - `GET
     *  /invoices/{invoice_id}/custom_objects/{custom_object_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getInvoiceCustomObject(ExsitedClient $client, int|string $invoiceId, int|string $customObjectId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(InvoicesUrls::INVOICE_CUSTOM_OBJECT, pathParams: ['invoice_id' => $invoiceId, 'custom_object_id' => $customObjectId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** One instance of a custom object on an invoice - `GET
     *  /invoices/{invoice_id}/custom_objects/{custom_object_id}/instances/{instance_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getInvoiceCustomObjectInstance(ExsitedClient $client, int|string $invoiceId, int|string $customObjectId, int|string $instanceId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(InvoicesUrls::INVOICE_CUSTOM_OBJECT_INSTANCE, pathParams: ['invoice_id' => $invoiceId, 'custom_object_id' => $customObjectId, 'instance_id' => $instanceId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Delete one attachment - `DELETE /invoices/{invoice_id}/notes/{note_id}/files/{file_id}`, by
     *  the attachment's `uuid`; `204`. */
    public static function deleteInvoiceNoteFile(ExsitedClient $client, int|string $invoiceId, int|string $invoiceNoteId, int|string $invoiceFileId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(InvoicesUrls::INVOICE_NOTE_FILE, pathParams: ['invoice_id' => $invoiceId, 'invoice_note_id' => $invoiceNoteId, 'invoice_file_id' => $invoiceFileId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
