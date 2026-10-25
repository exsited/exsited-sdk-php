<?php

declare(strict_types=1);

namespace Exsited\Resources\Refunds;

use Exsited\Client\ApiResponse;
use Exsited\Client\Dto;
use Exsited\Client\ExsitedClient;
use Exsited\Errors\SdkUsageError;
use Exsited\Resources\Refunds\RefundsDto\NoteFileList;
use Exsited\Resources\Refunds\RefundsDto\Refund;
use Exsited\Resources\Refunds\RefundsDto\RefundList;
use Exsited\Resources\Refunds\RefundsDto\RefundNote;
use Exsited\Resources\Refunds\RefundsDto\RefundNoteFile;
use Exsited\Resources\Refunds\RefundsDto\RefundNoteList;
use Exsited\Resources\Refunds\RefundsDto\RefundUpdated;

/** Refund endpoints, under `/api/{api_version}`. */
final class Refunds
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List - `GET /refunds`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getRefunds(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(RefundsUrls::REFUNDS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: RefundList::class);
    }

    /** Delete refund - `DELETE /refunds/{refund_id}`. */
    public static function deleteRefund(ExsitedClient $client, int|string $refundId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(RefundsUrls::REFUND, pathParams: ['refund_id' => $refundId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Get single - `GET /refunds/{refund_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getRefund(ExsitedClient $client, int|string $refundId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(RefundsUrls::REFUND, pathParams: ['refund_id' => $refundId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: Refund::class);
    }

    /** Update refund - `PATCH /refunds/{refund_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateRefund(ExsitedClient $client, int|string $refundId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(RefundsUrls::REFUND, pathParams: ['refund_id' => $refundId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: RefundUpdated::class);
    }

    /** Create refund - `POST /credit_notes/{credit_note_id}/refunds`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createCreditNoteRefund(ExsitedClient $client, int|string $creditNoteId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(RefundsUrls::CREDIT_NOTE_REFUNDS, pathParams: ['credit_note_id' => $creditNoteId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: RefundUpdated::class);
    }

    /** List a refund's notes - `GET /refunds/{refund_id}/notes`; a paged listing, under `data`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getRefundNotes(ExsitedClient $client, int|string $refundId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(RefundsUrls::REFUND_NOTES, pathParams: ['refund_id' => $refundId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: RefundNoteList::class);
    }

    /** Retrieve one note - `GET /refunds/{refund_id}/notes/{note_id}`, by its `note_` id; under
     *  `note`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getRefundNote(ExsitedClient $client, int|string $refundId, int|string $noteId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(RefundsUrls::REFUND_NOTE, pathParams: ['refund_id' => $refundId, 'note_id' => $noteId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: RefundNote::class);
    }

    /** Attach a note to a refund - `POST /refunds/{refund_id}/notes`; a form, the text as the
     *  `note` field, and `201` under `note`.
     *  @param array<string,mixed>|null $files the file parts, as the client's `files` takes them */
    public static function createRefundNote(ExsitedClient $client, int|string $refundId, string $note, ?array $files = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requireNote($note);
        return $client->sendPostRequest(RefundsUrls::REFUND_NOTES, pathParams: ['refund_id' => $refundId], formData: ['note' => $note], files: $files, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: RefundNote::class);
    }

    /** Delete one note - `DELETE /refunds/{refund_id}/notes/{note_id}`; `204`. The server checks
     *  `CREATE_REFUND_NOTE` here, not a delete permission. */
    public static function deleteRefundNote(ExsitedClient $client, int|string $refundId, int|string $noteId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(RefundsUrls::REFUND_NOTE, pathParams: ['refund_id' => $refundId, 'note_id' => $noteId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** List a note's attachments - `GET /refunds/{refund_id}/notes/{note_id}/files`, under `data`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getRefundNoteFiles(ExsitedClient $client, int|string $refundId, int|string $noteId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(RefundsUrls::REFUND_NOTE_FILES, pathParams: ['refund_id' => $refundId, 'note_id' => $noteId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: NoteFileList::class);
    }

    /** Retrieve one attachment - `GET /refunds/{refund_id}/notes/{note_id}/files/{file_id}`, by
     *  the attachment's `uuid`; a JSON descriptor under `file`, not the file's bytes.
     *  @param array<string,mixed>|null $queryParams */
    public static function getRefundNoteFile(ExsitedClient $client, int|string $refundId, int|string $noteId, int|string $fileId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(RefundsUrls::REFUND_NOTE_FILE, pathParams: ['refund_id' => $refundId, 'note_id' => $noteId, 'file_id' => $fileId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: RefundNoteFile::class);
    }

    /** Delete one attachment - `DELETE /refunds/{refund_id}/notes/{note_id}/files/{file_id}`, by
     *  the attachment's `uuid`; `204`. */
    public static function deleteRefundNoteFile(ExsitedClient $client, int|string $refundId, int|string $noteId, int|string $fileId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(RefundsUrls::REFUND_NOTE_FILE, pathParams: ['refund_id' => $refundId, 'note_id' => $noteId, 'file_id' => $fileId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
