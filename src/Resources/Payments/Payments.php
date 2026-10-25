<?php

declare(strict_types=1);

namespace Exsited\Resources\Payments;

use Exsited\Client\ApiResponse;
use Exsited\Client\Dto;
use Exsited\Client\ExsitedClient;
use Exsited\Errors\SdkUsageError;
use Exsited\Resources\Payments\PaymentsDto\NoteFileList;
use Exsited\Resources\Payments\PaymentsDto\PaymentList;
use Exsited\Resources\Payments\PaymentsDto\PaymentNoteFile;
use Exsited\Resources\Payments\PaymentsDto\PaymentNoteList;
use Exsited\Resources\Payments\PaymentsDto\PaymentNoteRead;
use Exsited\Resources\Payments\PaymentsDto\PaymentNotes;
use Exsited\Resources\Payments\PaymentsDto\PaymentRead;
use Exsited\Resources\Payments\PaymentsDto\PaymentsNoteList;

/** Payment endpoints, under `/api/{api_version}`. */
final class Payments
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List payments - `GET /payments`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPayments(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PaymentsUrls::PAYMENTS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PaymentList::class);
    }

    /** List all notes across payments - `GET /payments/notes`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPaymentsNotes(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PaymentsUrls::PAYMENTS_NOTES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PaymentsNoteList::class);
    }

    /** Delete payment - `DELETE /payments/{payment_id}`. */
    public static function deletePayment(ExsitedClient $client, int|string $paymentId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(PaymentsUrls::PAYMENT, pathParams: ['payment_id' => $paymentId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update payment information - `PATCH /payments/{payment_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updatePayment(ExsitedClient $client, int|string $paymentId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(PaymentsUrls::PAYMENT, pathParams: ['payment_id' => $paymentId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PaymentRead::class);
    }

    /** Get single - `GET /payments/{payment_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPayment(ExsitedClient $client, int|string $paymentId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PaymentsUrls::PAYMENT, pathParams: ['payment_id' => $paymentId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PaymentRead::class);
    }

    /** List invoice payments - `GET /invoices/{invoice_id}/payments`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getInvoicePayments(ExsitedClient $client, int|string $invoiceId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PaymentsUrls::INVOICE_PAYMENTS, pathParams: ['invoice_id' => $invoiceId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PaymentList::class);
    }

    /** List order payments - `GET /orders/{order_id}/payments`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getOrderPayments(ExsitedClient $client, int|string $orderId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PaymentsUrls::ORDER_PAYMENTS, pathParams: ['order_id' => $orderId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PaymentList::class);
    }

    /** List notes - `GET /payments/{payment_id}/notes`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPaymentNotes(ExsitedClient $client, int|string $paymentId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PaymentsUrls::PAYMENT_NOTES, pathParams: ['payment_id' => $paymentId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PaymentNoteList::class);
    }

    /** Create note - `POST /payments/{payment_id}/notes`.
     *  Sent as a form: the text as the `note` field, with any `$files` as multipart parts.
     *  @param array<string,mixed>|null $files the file parts, as the client's `files` takes them */
    public static function createPaymentNote(ExsitedClient $client, int|string $paymentId, string $note, ?array $files = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requireNote($note);
        return $client->sendPostRequest(PaymentsUrls::PAYMENT_NOTES, pathParams: ['payment_id' => $paymentId], formData: ['note' => $note], files: $files, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PaymentNotes::class);
    }

    /** Get specific note - `GET /payments/{payment_id}/notes/{payment_note_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPaymentNote(ExsitedClient $client, int|string $paymentId, int|string $paymentNoteId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PaymentsUrls::PAYMENT_NOTE, pathParams: ['payment_id' => $paymentId, 'payment_note_id' => $paymentNoteId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PaymentNoteRead::class);
    }

    /** Delete note - `DELETE /payments/{payment_id}/notes/{payment_note_id}`. */
    public static function deletePaymentNote(ExsitedClient $client, int|string $paymentId, int|string $paymentNoteId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(PaymentsUrls::PAYMENT_NOTE, pathParams: ['payment_id' => $paymentId, 'payment_note_id' => $paymentNoteId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Get note file - `GET
     *  /payments/{payment_id}/notes/{payment_note_id}/files/{payment_fil e_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPaymentNoteFile(ExsitedClient $client, int|string $paymentId, int|string $paymentNoteId, int|string $paymentFileId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PaymentsUrls::PAYMENT_NOTE_FILE, pathParams: ['payment_id' => $paymentId, 'payment_note_id' => $paymentNoteId, 'payment_file_id' => $paymentFileId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PaymentNoteFile::class);
    }

    /** Record a payment - `POST /payments`, wrapped in `payment`; `201`, answered as `getPayment`
     *  reads it. A `payment_applied` processor with a card token charges the card.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createPayment(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(PaymentsUrls::PAYMENTS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PaymentRead::class);
    }

    /** Retrieve one payment through an invoice - `GET
     *  /invoices/{invoice_id}/payments/{payment_id}`; the payment is not checked against the
     *  invoice, only the invoice's existence is.
     *  @param array<string,mixed>|null $queryParams */
    public static function getInvoicePayment(ExsitedClient $client, int|string $invoiceId, int|string $paymentId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PaymentsUrls::INVOICE_PAYMENT, pathParams: ['invoice_id' => $invoiceId, 'payment_id' => $paymentId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PaymentRead::class);
    }

    /** List a note's attachments - `GET /payments/{payment_id}/notes/{payment_note_id}/files`,
     *  under `data`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPaymentNoteFiles(ExsitedClient $client, int|string $paymentId, int|string $paymentNoteId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PaymentsUrls::PAYMENT_NOTE_FILES, pathParams: ['payment_id' => $paymentId, 'payment_note_id' => $paymentNoteId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: NoteFileList::class);
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
