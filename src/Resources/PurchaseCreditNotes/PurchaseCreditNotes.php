<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseCreditNotes;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\PurchaseCreditNotes\PurchaseCreditNotesDto\PurchaseCreditNoteCreated;
use Exsited\Sdk\Resources\PurchaseCreditNotes\PurchaseCreditNotesDto\PurchaseCreditNoteList;
use Exsited\Sdk\Resources\PurchaseCreditNotes\PurchaseCreditNotesDto\PurchaseCreditNoteRead;

/** Purchase credit note endpoints, under `/api/{api_version}/purchase_credit_notes`. */
final class PurchaseCreditNotes
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List purchase credit notes - `GET /purchase_credit_notes`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseCreditNotes(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseCreditNotesUrls::PURCHASE_CREDIT_NOTES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseCreditNoteList::class);
    }

    /** Get single - `GET /purchase_credit_notes/{purchase_credit_note_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseCreditNote(ExsitedClient $client, int|string $purchaseCreditNoteId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseCreditNotesUrls::PURCHASE_CREDIT_NOTE, pathParams: ['purchase_credit_note_id' => $purchaseCreditNoteId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseCreditNoteRead::class);
    }

    /** Update - `PATCH /purchase_credit_notes/{purchase_credit_note_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updatePurchaseCreditNote(ExsitedClient $client, int|string $purchaseCreditNoteId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(PurchaseCreditNotesUrls::PURCHASE_CREDIT_NOTE, pathParams: ['purchase_credit_note_id' => $purchaseCreditNoteId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseCreditNoteRead::class);
    }

    /** Credit a purchase invoice - `POST /purchase_credit_notes`, as `{"purchase_credit_note":
     *  {purchase_invoice_id, amount}}`; `201`, drawn from its payments.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createPurchaseCreditNote(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(PurchaseCreditNotesUrls::PURCHASE_CREDIT_NOTES, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseCreditNoteCreated::class);
    }

    /** Delete a purchase credit note - `DELETE /purchase_credit_notes/{purchase_credit_note_id}`,
     *  by its `pcn_` id only; `204`. */
    public static function deletePurchaseCreditNote(ExsitedClient $client, int|string $purchaseCreditNoteId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(PurchaseCreditNotesUrls::PURCHASE_CREDIT_NOTE, pathParams: ['purchase_credit_note_id' => $purchaseCreditNoteId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Apply credit to purchase invoices - `POST
     *  /purchase_credit_notes/{purchase_credit_note_id}/apply`, under
     *  `purchase_credit_note.purchase_invoices`; it records a purchase payment.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function applyPurchaseCreditNote(ExsitedClient $client, int|string $purchaseCreditNoteId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(PurchaseCreditNotesUrls::PURCHASE_CREDIT_NOTE_APPLY, pathParams: ['purchase_credit_note_id' => $purchaseCreditNoteId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseCreditNoteCreated::class);
    }

    /** Attach a note - `POST /purchase_credit_notes/{purchase_credit_note_id}/notes`; a form, the
     *  text as the `note` field, and `201`.
     *  @param array<string,mixed>|null $files the file parts, as the client's `files` takes them */
    public static function createPurchaseCreditNoteNote(ExsitedClient $client, int|string $purchaseCreditNoteId, string $note, ?array $files = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requireNote($note);
        return $client->sendPostRequest(PurchaseCreditNotesUrls::PURCHASE_CREDIT_NOTE_NOTES, pathParams: ['purchase_credit_note_id' => $purchaseCreditNoteId], formData: ['note' => $note], files: $files, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Delete one note - `DELETE
     *  /purchase_credit_notes/{purchase_credit_note_id}/notes/{note_id}`, by the `pcn_` and
     *  `note_` ids; `204`. */
    public static function deletePurchaseCreditNoteNote(ExsitedClient $client, int|string $purchaseCreditNoteId, int|string $noteId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(PurchaseCreditNotesUrls::PURCHASE_CREDIT_NOTE_NOTE, pathParams: ['purchase_credit_note_id' => $purchaseCreditNoteId, 'note_id' => $noteId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
