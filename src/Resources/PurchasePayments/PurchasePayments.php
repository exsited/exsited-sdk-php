<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchasePayments;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\PurchasePayments\PurchasePaymentsDto\PurchaseCreditNoteList;
use Exsited\Sdk\Resources\PurchasePayments\PurchasePaymentsDto\PurchasePaymentList;
use Exsited\Sdk\Resources\PurchasePayments\PurchasePaymentsDto\PurchasePaymentNoteFile;
use Exsited\Sdk\Resources\PurchasePayments\PurchasePaymentsDto\PurchasePaymentNoteList;
use Exsited\Sdk\Resources\PurchasePayments\PurchasePaymentsDto\PurchasePaymentNoteRead;
use Exsited\Sdk\Resources\PurchasePayments\PurchasePaymentsDto\PurchasePaymentNoteUpdated;
use Exsited\Sdk\Resources\PurchasePayments\PurchasePaymentsDto\PurchasePaymentNotes;
use Exsited\Sdk\Resources\PurchasePayments\PurchasePaymentsDto\PurchasePaymentRead;
use Exsited\Sdk\Resources\PurchasePayments\PurchasePaymentsDto\PurchasePaymentUpdated;
use Exsited\Sdk\Resources\PurchasePayments\PurchasePaymentsDto\PurchasePaymentsView;

/** Purchase payment endpoints, under `/api/{api_version}`. */
final class PurchasePayments
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List purchase payments - `GET /purchase_payments`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchasePayments(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchasePaymentsUrls::PURCHASE_PAYMENTS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchasePaymentList::class);
    }

    /** Create purchase payment - `POST /purchase_payments`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createPurchasePayment(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(PurchasePaymentsUrls::PURCHASE_PAYMENTS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchasePaymentsView::class);
    }

    /** Delete purchase payment - `DELETE /purchase_payments/{purchase_payment_id}`. */
    public static function deletePurchasePayment(ExsitedClient $client, int|string $purchasePaymentId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(PurchasePaymentsUrls::PURCHASE_PAYMENT, pathParams: ['purchase_payment_id' => $purchasePaymentId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Get single - `GET /purchase_payments/{purchase_payment_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchasePayment(ExsitedClient $client, int|string $purchasePaymentId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchasePaymentsUrls::PURCHASE_PAYMENT, pathParams: ['purchase_payment_id' => $purchasePaymentId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchasePaymentRead::class);
    }

    /** Update purchase payment - `PATCH /purchase_payments/{purchase_payment_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updatePurchasePayment(ExsitedClient $client, int|string $purchasePaymentId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(PurchasePaymentsUrls::PURCHASE_PAYMENT, pathParams: ['purchase_payment_id' => $purchasePaymentId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchasePaymentUpdated::class);
    }

    /** PI-scoped payment - `POST /purchase_invoices/{purchase_invoice_id}/purchase_payments`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createPurchaseInvoicePurchasePayment(ExsitedClient $client, int|string $purchaseInvoiceId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(PurchasePaymentsUrls::PURCHASE_INVOICE_PURCHASE_PAYMENTS, pathParams: ['purchase_invoice_id' => $purchaseInvoiceId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchasePaymentsView::class);
    }

    /** List purchase payment notes - `GET /purchase_payments/{purchase_payment_id}/notes`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchasePaymentNotes(ExsitedClient $client, int|string $purchasePaymentId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchasePaymentsUrls::PURCHASE_PAYMENT_NOTES, pathParams: ['purchase_payment_id' => $purchasePaymentId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchasePaymentNoteList::class);
    }

    /** Create note - `POST /purchase_payments/{purchase_payment_id}/notes`.
     *  Sent as a form: the text as the `note` field, with any `$files` as multipart parts.
     *  @param array<string,mixed>|null $files the file parts, as the client's `files` takes them */
    public static function createPurchasePaymentNote(ExsitedClient $client, int|string $purchasePaymentId, string $note, ?array $files = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requireNote($note);
        return $client->sendPostRequest(PurchasePaymentsUrls::PURCHASE_PAYMENT_NOTES, pathParams: ['purchase_payment_id' => $purchasePaymentId], formData: ['note' => $note], files: $files, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchasePaymentNotes::class);
    }

    /** Get single - `GET /purchase_payments/{purchase_payment_id}/notes/{pp_note_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchasePaymentNote(ExsitedClient $client, int|string $purchasePaymentId, int|string $ppNoteId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchasePaymentsUrls::PURCHASE_PAYMENT_NOTE, pathParams: ['purchase_payment_id' => $purchasePaymentId, 'pp_note_id' => $ppNoteId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchasePaymentNoteRead::class);
    }

    /** Delete purchase payment note - `DELETE
     *  /purchase_payments/{purchase_payment_id}/notes/{pp_note_id}`. */
    public static function deletePurchasePaymentNote(ExsitedClient $client, int|string $purchasePaymentId, int|string $ppNoteId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(PurchasePaymentsUrls::PURCHASE_PAYMENT_NOTE, pathParams: ['purchase_payment_id' => $purchasePaymentId, 'pp_note_id' => $ppNoteId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** List purchase payment note files - `GET
     *  /purchase_payments/{purchase_payment_id}/notes/{pp_note_id}/files`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchasePaymentNoteFiles(ExsitedClient $client, int|string $purchasePaymentId, int|string $ppNoteId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchasePaymentsUrls::PURCHASE_PAYMENT_NOTE_FILES, pathParams: ['purchase_payment_id' => $purchasePaymentId, 'pp_note_id' => $ppNoteId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchasePaymentNoteRead::class);
    }

    /** `GET /purchase_payments/{purchase_payment_id}/notes/{pp_note_id}/files /{file_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchasePaymentNoteFile(ExsitedClient $client, int|string $purchasePaymentId, int|string $ppNoteId, int|string $fileId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchasePaymentsUrls::PURCHASE_PAYMENT_NOTE_FILE, pathParams: ['purchase_payment_id' => $purchasePaymentId, 'pp_note_id' => $ppNoteId, 'file_id' => $fileId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchasePaymentNoteFile::class);
    }

    /** The purchase credit notes a payment raised - `GET
     *  /purchase_payments/{purchase_payment_id}/purchase_credit_notes`; a paged listing.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchasePaymentPurchaseCreditNotes(ExsitedClient $client, int|string $purchasePaymentId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchasePaymentsUrls::PURCHASE_PAYMENT_PURCHASE_CREDIT_NOTES, pathParams: ['purchase_payment_id' => $purchasePaymentId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseCreditNoteList::class);
    }

    /** Update a note - `PATCH /purchase_payments/{purchase_payment_id}/notes/{pp_note_id}`; a
     *  form, the text as the `note` field, answered under `note`.
     *  @param array<string,mixed>|null $files the file parts, as the client's `files` takes them */
    public static function updatePurchasePaymentNote(ExsitedClient $client, int|string $purchasePaymentId, int|string $ppNoteId, string $note, ?array $files = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requireNote($note);
        return $client->sendPatchRequest(PurchasePaymentsUrls::PURCHASE_PAYMENT_NOTE, pathParams: ['purchase_payment_id' => $purchasePaymentId, 'pp_note_id' => $ppNoteId], formData: ['note' => $note], files: $files, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchasePaymentNoteUpdated::class);
    }

    /** Delete one attachment - `DELETE
     *  /purchase_payments/{purchase_payment_id}/notes/{pp_note_id}/files/{file_id}`, by the
     *  attachment's `uuid`; `204`. */
    public static function deletePurchasePaymentNoteFile(ExsitedClient $client, int|string $purchasePaymentId, int|string $ppNoteId, int|string $fileId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(PurchasePaymentsUrls::PURCHASE_PAYMENT_NOTE_FILE, pathParams: ['purchase_payment_id' => $purchasePaymentId, 'pp_note_id' => $ppNoteId, 'file_id' => $fileId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
