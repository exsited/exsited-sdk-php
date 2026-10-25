<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseInvoices;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\PurchaseInvoices\PurchaseInvoicesDto\AccountPurchaseInvoices;
use Exsited\Sdk\Resources\PurchaseInvoices\PurchaseInvoicesDto\PurchaseCreditNoteApplicationRead;
use Exsited\Sdk\Resources\PurchaseInvoices\PurchaseInvoicesDto\PurchaseInvoice;
use Exsited\Sdk\Resources\PurchaseInvoices\PurchaseInvoicesDto\PurchaseInvoiceCancel;
use Exsited\Sdk\Resources\PurchaseInvoices\PurchaseInvoicesDto\PurchaseInvoiceInformation;
use Exsited\Sdk\Resources\PurchaseInvoices\PurchaseInvoicesDto\PurchaseInvoiceLine;
use Exsited\Sdk\Resources\PurchaseInvoices\PurchaseInvoicesDto\PurchaseInvoiceLines;
use Exsited\Sdk\Resources\PurchaseInvoices\PurchaseInvoicesDto\PurchaseInvoiceList;
use Exsited\Sdk\Resources\PurchaseInvoices\PurchaseInvoicesDto\PurchaseInvoiceNoteFile;
use Exsited\Sdk\Resources\PurchaseInvoices\PurchaseInvoicesDto\PurchaseInvoiceNoteList;
use Exsited\Sdk\Resources\PurchaseInvoices\PurchaseInvoicesDto\PurchaseInvoiceNoteRead;
use Exsited\Sdk\Resources\PurchaseInvoices\PurchaseInvoicesDto\PurchaseInvoiceNoteUpdated;
use Exsited\Sdk\Resources\PurchaseInvoices\PurchaseInvoicesDto\PurchaseInvoiceNotes;
use Exsited\Sdk\Resources\PurchaseInvoices\PurchaseInvoicesDto\PurchaseInvoicePurchasePaymentList;
use Exsited\Sdk\Resources\PurchaseInvoices\PurchaseInvoicesDto\PurchaseInvoiceRead;
use Exsited\Sdk\Resources\PurchaseInvoices\PurchaseInvoicesDto\PurchaseInvoicesNoteList;

/** Purchase invoice endpoints, under `/api/{api_version}`. */
final class PurchaseInvoices
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List purchase invoices - `GET /purchase_invoices`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseInvoices(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseInvoicesUrls::PURCHASE_INVOICES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseInvoiceList::class);
    }

    /** Create - `POST /purchase_invoices`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createPurchaseInvoice(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(PurchaseInvoicesUrls::PURCHASE_INVOICES, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseInvoiceRead::class);
    }

    /** List all notes - `GET /purchase_invoices/notes`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseInvoicesNotes(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseInvoicesUrls::PURCHASE_INVOICES_NOTES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseInvoicesNoteList::class);
    }

    /** Delete purchase invoice - `DELETE /purchase_invoices/{purchase_invoice_id}`. */
    public static function deletePurchaseInvoice(ExsitedClient $client, int|string $purchaseInvoiceId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(PurchaseInvoicesUrls::PURCHASE_INVOICE, pathParams: ['purchase_invoice_id' => $purchaseInvoiceId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Get single - `GET /purchase_invoices/{purchase_invoice_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseInvoice(ExsitedClient $client, int|string $purchaseInvoiceId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseInvoicesUrls::PURCHASE_INVOICE, pathParams: ['purchase_invoice_id' => $purchaseInvoiceId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseInvoiceRead::class);
    }

    /** Amend purchase invoice - `POST /purchase_invoices/{purchase_invoice_id}/amend`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function amendPurchaseInvoice(ExsitedClient $client, int|string $purchaseInvoiceId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(PurchaseInvoicesUrls::PURCHASE_INVOICE_AMEND, pathParams: ['purchase_invoice_id' => $purchaseInvoiceId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseInvoiceRead::class);
    }

    /** Cancel purchase invoice - `POST
     *  /purchase_invoices/{purchase_invoice_id}/cancel`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function cancelPurchaseInvoice(ExsitedClient $client, int|string $purchaseInvoiceId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(PurchaseInvoicesUrls::PURCHASE_INVOICE_CANCEL, pathParams: ['purchase_invoice_id' => $purchaseInvoiceId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseInvoiceCancel::class);
    }

    /** Purchase invoice information - `GET /purchase_invoices/{purchase_invoice_id}/information`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseInvoiceInformation(ExsitedClient $client, int|string $purchaseInvoiceId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseInvoicesUrls::PURCHASE_INVOICE_INFORMATION, pathParams: ['purchase_invoice_id' => $purchaseInvoiceId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseInvoice::class);
    }

    /** Update purchase invoice information - `PATCH
     *  /purchase_invoices/{purchase_invoice_id}/information`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updatePurchaseInvoiceInformation(ExsitedClient $client, int|string $purchaseInvoiceId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(PurchaseInvoicesUrls::PURCHASE_INVOICE_INFORMATION, pathParams: ['purchase_invoice_id' => $purchaseInvoiceId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseInvoiceInformation::class);
    }

    /** List purchase invoice lines - `GET /purchase_invoices/{purchase_invoice_id}/lines`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseInvoiceLines(ExsitedClient $client, int|string $purchaseInvoiceId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseInvoicesUrls::PURCHASE_INVOICE_LINES, pathParams: ['purchase_invoice_id' => $purchaseInvoiceId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseInvoiceLines::class);
    }

    /** List purchase invoice notes - `GET /purchase_invoices/{purchase_invoice_id}/notes`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseInvoiceNotes(ExsitedClient $client, int|string $purchaseInvoiceId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseInvoicesUrls::PURCHASE_INVOICE_NOTES, pathParams: ['purchase_invoice_id' => $purchaseInvoiceId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseInvoiceNoteList::class);
    }

    /** Create note - `POST /purchase_invoices/{purchase_invoice_id}/notes`.
     *  Sent as a form: the text as the `note` field, with any `$files` as multipart parts.
     *  @param array<string,mixed>|null $files the file parts, as the client's `files` takes them */
    public static function createPurchaseInvoiceNote(ExsitedClient $client, int|string $purchaseInvoiceId, string $note, ?array $files = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requireNote($note);
        return $client->sendPostRequest(PurchaseInvoicesUrls::PURCHASE_INVOICE_NOTES, pathParams: ['purchase_invoice_id' => $purchaseInvoiceId], formData: ['note' => $note], files: $files, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseInvoiceNotes::class);
    }

    /** Purchase invoice PDF - `GET /purchase_invoices/{purchase_invoice_id}/pdf`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseInvoicePdf(ExsitedClient $client, int|string $purchaseInvoiceId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseInvoicesUrls::PURCHASE_INVOICE_PDF, pathParams: ['purchase_invoice_id' => $purchaseInvoiceId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** `GET /purchase_invoices/{purchase_invoice_id}/purchase_credit_note_app lications`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseInvoicePurchaseCreditNoteApplications(ExsitedClient $client, int|string $purchaseInvoiceId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseInvoicesUrls::PURCHASE_INVOICE_PURCHASE_CREDIT_NOTE_APPLICATIONS, pathParams: ['purchase_invoice_id' => $purchaseInvoiceId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountPurchaseInvoices::class);
    }

    /** List purchase invoice purchase payments - `GET
     *  /purchase_invoices/{purchase_invoice_id}/purchase_payments`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseInvoicePurchasePayments(ExsitedClient $client, int|string $purchaseInvoiceId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseInvoicesUrls::PURCHASE_INVOICE_PURCHASE_PAYMENTS, pathParams: ['purchase_invoice_id' => $purchaseInvoiceId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseInvoicePurchasePaymentList::class);
    }

    /** Reactivate purchase invoice - `POST /purchase_invoices/{purchase_invoice_id}/reactivate`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function reactivatePurchaseInvoice(ExsitedClient $client, int|string $purchaseInvoiceId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(PurchaseInvoicesUrls::PURCHASE_INVOICE_REACTIVATE, pathParams: ['purchase_invoice_id' => $purchaseInvoiceId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseInvoiceRead::class);
    }

    /** Get single - `GET /purchase_invoices/{purchase_invoice_id}/lines/{purchase_invoice_
     *  line_uuid}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseInvoiceLine(ExsitedClient $client, int|string $purchaseInvoiceId, int|string $purchaseInvoiceLineUuid, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseInvoicesUrls::PURCHASE_INVOICE_LINE, pathParams: ['purchase_invoice_id' => $purchaseInvoiceId, 'purchase_invoice_line_uuid' => $purchaseInvoiceLineUuid], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseInvoiceLine::class);
    }

    /** Update note - `PATCH /purchase_invoices/{purchase_invoice_id}/notes/{note_id}`.
     *  Sent as a form: the text as the `note` field, with any `$files` as multipart parts.
     *  @param array<string,mixed>|null $files the file parts, as the client's `files` takes them */
    public static function updatePurchaseInvoiceNote(ExsitedClient $client, int|string $purchaseInvoiceId, int|string $noteId, string $note, ?array $files = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requireNote($note);
        return $client->sendPatchRequest(PurchaseInvoicesUrls::PURCHASE_INVOICE_NOTE, pathParams: ['purchase_invoice_id' => $purchaseInvoiceId, 'note_id' => $noteId], formData: ['note' => $note], files: $files, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseInvoiceNoteUpdated::class);
    }

    /** Get single - `GET /purchase_invoices/{purchase_invoice_id}/notes/{note_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseInvoiceNote(ExsitedClient $client, int|string $purchaseInvoiceId, int|string $noteId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseInvoicesUrls::PURCHASE_INVOICE_NOTE, pathParams: ['purchase_invoice_id' => $purchaseInvoiceId, 'note_id' => $noteId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseInvoiceNoteRead::class);
    }

    /** Delete purchase invoice note - `DELETE
     *  /purchase_invoices/{purchase_invoice_id}/notes/{note_id}`. */
    public static function deletePurchaseInvoiceNote(ExsitedClient $client, int|string $purchaseInvoiceId, int|string $noteId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(PurchaseInvoicesUrls::PURCHASE_INVOICE_NOTE, pathParams: ['purchase_invoice_id' => $purchaseInvoiceId, 'note_id' => $noteId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** List purchase invoice note files - `GET
     *  /purchase_invoices/{purchase_invoice_id}/notes/{note_id}/files`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseInvoiceNoteFiles(ExsitedClient $client, int|string $purchaseInvoiceId, int|string $noteId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseInvoicesUrls::PURCHASE_INVOICE_NOTE_FILES, pathParams: ['purchase_invoice_id' => $purchaseInvoiceId, 'note_id' => $noteId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseInvoiceNoteRead::class);
    }

    /** Get single - `GET /purchase_invoices/{purchase_invoice_id}/notes/{note_id}/files/{f
     *  ile_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseInvoiceNoteFile(ExsitedClient $client, int|string $purchaseInvoiceId, int|string $noteId, int|string $fileId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseInvoicesUrls::PURCHASE_INVOICE_NOTE_FILE, pathParams: ['purchase_invoice_id' => $purchaseInvoiceId, 'note_id' => $noteId, 'file_id' => $fileId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseInvoiceNoteFile::class);
    }

    /** One purchase credit note application through a purchase invoice - `GET
     *  /purchase_invoices/{purchase_invoice_id}/purchase_credit_note_applications/{application_id}`;
     *  not checked against the invoice, so any application answers under any invoice.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseInvoicePurchaseCreditNoteApplication(ExsitedClient $client, int|string $purchaseInvoiceId, int|string $applicationId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseInvoicesUrls::PURCHASE_INVOICE_PURCHASE_CREDIT_NOTE_APPLICATION, pathParams: ['purchase_invoice_id' => $purchaseInvoiceId, 'application_id' => $applicationId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseCreditNoteApplicationRead::class);
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
