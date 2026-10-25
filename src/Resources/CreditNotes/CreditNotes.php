<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CreditNotes;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\CreditNotes\CreditNotesDto\CreditNoteApplications;
use Exsited\Sdk\Resources\CreditNotes\CreditNotesDto\CreditNoteItems;
use Exsited\Sdk\Resources\CreditNotes\CreditNotesDto\CreditNoteList;
use Exsited\Sdk\Resources\CreditNotes\CreditNotesDto\CreditNoteNote;
use Exsited\Sdk\Resources\CreditNotes\CreditNotesDto\CreditNoteNoteList;
use Exsited\Sdk\Resources\CreditNotes\CreditNotesDto\CreditNoteRead;

/** Credit note endpoints, under `/api/{api_version}/credit_notes`. */
final class CreditNotes
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List credit notes - `GET /credit_notes`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getCreditNotes(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CreditNotesUrls::CREDIT_NOTES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: CreditNoteList::class);
    }

    /** Get single - `GET /credit_notes/{credit_note_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getCreditNote(ExsitedClient $client, int|string $creditNoteId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CreditNotesUrls::CREDIT_NOTE, pathParams: ['credit_note_id' => $creditNoteId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: CreditNoteRead::class);
    }

    /** Update credit note - `PATCH /credit_notes/{credit_note_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateCreditNote(ExsitedClient $client, int|string $creditNoteId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(CreditNotesUrls::CREDIT_NOTE, pathParams: ['credit_note_id' => $creditNoteId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: CreditNoteRead::class);
    }

    /** Credit an invoice - `POST /credit_notes`, `{"credit_note": {invoice_id, amount}}`; `201`.
     *  The amount is drawn from the invoice's active payments, oldest first.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createCreditNote(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(CreditNotesUrls::CREDIT_NOTES, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Delete a credit note - `DELETE /credit_notes/{credit_note_id}`, by `cn_` id or code; `204`.
     *  A credit note with an active refund is refused `400` `in_use`. */
    public static function deleteCreditNote(ExsitedClient $client, int|string $creditNoteId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(CreditNotesUrls::CREDIT_NOTE, pathParams: ['credit_note_id' => $creditNoteId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Apply a credit note to invoices - `POST /credit_notes/{credit_note_id}/apply`, under
     *  `credit_note.invoices`; it records a payment against each, and answers the credit note.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function applyCreditNote(ExsitedClient $client, int|string $creditNoteId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(CreditNotesUrls::CREDIT_NOTE_APPLY, pathParams: ['credit_note_id' => $creditNoteId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** A credit note's balance rows - `GET /credit_notes/{credit_note_id}/items`, under
     *  `credit_note.items`; not a paged listing.
     *  @param array<string,mixed>|null $queryParams */
    public static function getCreditNoteItems(ExsitedClient $client, int|string $creditNoteId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CreditNotesUrls::CREDIT_NOTE_ITEMS, pathParams: ['credit_note_id' => $creditNoteId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: CreditNoteItems::class);
    }

    /** A credit note's applications - `GET
     *  /credit_notes/{credit_note_id}/credit_note_applications`, under `credit_note.applications`;
     *  not a paged listing.
     *  @param array<string,mixed>|null $queryParams */
    public static function getCreditNoteCreditNoteApplications(ExsitedClient $client, int|string $creditNoteId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CreditNotesUrls::CREDIT_NOTE_CREDIT_NOTE_APPLICATIONS, pathParams: ['credit_note_id' => $creditNoteId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: CreditNoteApplications::class);
    }

    /** List a credit note's notes - `GET /credit_notes/{credit_note_id}/notes`; a paged listing,
     *  under `data`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getCreditNoteNotes(ExsitedClient $client, int|string $creditNoteId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CreditNotesUrls::CREDIT_NOTE_NOTES, pathParams: ['credit_note_id' => $creditNoteId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: CreditNoteNoteList::class);
    }

    /** Retrieve one note - `GET /credit_notes/{credit_note_id}/notes/{note_id}`, by its `note_`
     *  id; under `note`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getCreditNoteNote(ExsitedClient $client, int|string $creditNoteId, int|string $noteId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CreditNotesUrls::CREDIT_NOTE_NOTE, pathParams: ['credit_note_id' => $creditNoteId, 'note_id' => $noteId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: CreditNoteNote::class);
    }

    /** Attach a note to a credit note - `POST /credit_notes/{credit_note_id}/notes`; a form, the
     *  text as the `note` field, and `201`.
     *  @param array<string,mixed>|null $files the file parts, as the client's `files` takes them */
    public static function createCreditNoteNote(ExsitedClient $client, int|string $creditNoteId, string $note, ?array $files = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requireNote($note);
        return $client->sendPostRequest(CreditNotesUrls::CREDIT_NOTE_NOTES, pathParams: ['credit_note_id' => $creditNoteId], formData: ['note' => $note], files: $files, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Delete one note - `DELETE /credit_notes/{credit_note_id}/notes/{note_id}`, by its `note_`
     *  id; `204`. */
    public static function deleteCreditNoteNote(ExsitedClient $client, int|string $creditNoteId, int|string $noteId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(CreditNotesUrls::CREDIT_NOTE_NOTE, pathParams: ['credit_note_id' => $creditNoteId, 'note_id' => $noteId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** List a note's attachments - `GET /credit_notes/{credit_note_id}/notes/{note_id}/files`,
     *  under `data`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getCreditNoteNoteFiles(ExsitedClient $client, int|string $creditNoteId, int|string $noteId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CreditNotesUrls::CREDIT_NOTE_NOTE_FILES, pathParams: ['credit_note_id' => $creditNoteId, 'note_id' => $noteId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Retrieve one attachment - `GET
     *  /credit_notes/{credit_note_id}/notes/{note_id}/files/{file_id}`; a JSON descriptor under
     *  `file`, not the file's bytes.
     *  @param array<string,mixed>|null $queryParams */
    public static function getCreditNoteNoteFile(ExsitedClient $client, int|string $creditNoteId, int|string $noteId, int|string $fileId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CreditNotesUrls::CREDIT_NOTE_NOTE_FILE, pathParams: ['credit_note_id' => $creditNoteId, 'note_id' => $noteId, 'file_id' => $fileId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
