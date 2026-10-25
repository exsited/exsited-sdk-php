<?php

declare(strict_types=1);

namespace Exsited\Resources\ReturnMerchandiseAuthorisations;

use Exsited\Client\ApiResponse;
use Exsited\Client\Dto;
use Exsited\Client\ExsitedClient;
use Exsited\Errors\SdkUsageError;
use Exsited\Resources\ReturnMerchandiseAuthorisations\ReturnMerchandiseAuthorisationsDto\InvoiceReturnMerchandiseAuthorisationReceive;
use Exsited\Resources\ReturnMerchandiseAuthorisations\ReturnMerchandiseAuthorisationsDto\InvoiceReturnMerchandiseAuthorisationReceiveList;
use Exsited\Resources\ReturnMerchandiseAuthorisations\ReturnMerchandiseAuthorisationsDto\ReturnMerchandiseAuthorisationList;
use Exsited\Resources\ReturnMerchandiseAuthorisations\ReturnMerchandiseAuthorisationsDto\ReturnMerchandiseAuthorisationRead;
use Exsited\Resources\ReturnMerchandiseAuthorisations\ReturnMerchandiseAuthorisationsDto\ReturnMerchandiseAuthorisationsView;

/** Return merchandise authorisation endpoints, under `/api/{api_version}`. */
final class ReturnMerchandiseAuthorisations
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List of RMAs - `GET /return_merchandise_authorisations`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getReturnMerchandiseAuthorisations(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ReturnMerchandiseAuthorisationsUrls::RETURN_MERCHANDISE_AUTHORISATIONS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ReturnMerchandiseAuthorisationList::class);
    }

    /** Create RMA - `POST /return_merchandise_authorisations`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createReturnMerchandiseAuthorisation(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ReturnMerchandiseAuthorisationsUrls::RETURN_MERCHANDISE_AUTHORISATIONS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ReturnMerchandiseAuthorisationsView::class);
    }

    /** RMA details - `GET /return_merchandise_authorisations/{rma_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getReturnMerchandiseAuthorisation(ExsitedClient $client, int|string $rmaId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ReturnMerchandiseAuthorisationsUrls::RETURN_MERCHANDISE_AUTHORISATION, pathParams: ['rma_id' => $rmaId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ReturnMerchandiseAuthorisationRead::class);
    }

    /** `GET /invoices/{invoice_id}/return_merchandise_authorisations/{rma_code} /receive`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getInvoiceReturnMerchandiseAuthorisationReceive(ExsitedClient $client, int|string $invoiceId, int|string $rmaId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ReturnMerchandiseAuthorisationsUrls::INVOICE_RETURN_MERCHANDISE_AUTHORISATION_RECEIVE, pathParams: ['invoice_id' => $invoiceId, 'rma_code' => $rmaId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: InvoiceReturnMerchandiseAuthorisationReceiveList::class);
    }

    /** `GET /invoices/{invoice_id}/return_merchandise_authorisations/{rma_code}
     *  /receive/{receive_uuid}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getInvoiceReturnMerchandiseAuthorisationReceiveByUuid(ExsitedClient $client, int|string $invoiceId, int|string $rmaId, int|string $receiveUuid, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ReturnMerchandiseAuthorisationsUrls::INVOICE_RETURN_MERCHANDISE_AUTHORISATION_RECEIVE_BY_UUID, pathParams: ['invoice_id' => $invoiceId, 'rma_code' => $rmaId, 'receive_uuid' => $receiveUuid], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: InvoiceReturnMerchandiseAuthorisationReceive::class);
    }

    /** Add RMA note - `POST /return_merchandise_authorisations/{rma_id}/notes`, the `rma_` id and
     *  a JSON `{"note": {"note": "..."}}`, not a form; no attachment.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createReturnMerchandiseAuthorisationNote(ExsitedClient $client, int|string $rmaId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ReturnMerchandiseAuthorisationsUrls::RETURN_MERCHANDISE_AUTHORISATION_NOTES, pathParams: ['rma_id' => $rmaId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Receive returned stock - `POST /return_merchandise_authorisations/{rma_id}/receive`,
     *  `{"return_merchandise_authorisation": {"receive_returns": [{"uuid",
     *  "rma_receive_quantity"}]}}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function receiveReturnMerchandiseAuthorisation(ExsitedClient $client, int|string $rmaId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ReturnMerchandiseAuthorisationsUrls::RETURN_MERCHANDISE_AUTHORISATION_RECEIVE, pathParams: ['rma_id' => $rmaId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ReturnMerchandiseAuthorisationRead::class);
    }

    /** Delete RMA - `DELETE /return_merchandise_authorisations/{rma_id}`, the `rma_` id; only a
     *  draft is deleted, anything else is refused `400` `stock_committed`. */
    public static function deleteReturnMerchandiseAuthorisation(ExsitedClient $client, int|string $rmaId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(ReturnMerchandiseAuthorisationsUrls::RETURN_MERCHANDISE_AUTHORISATION, pathParams: ['rma_id' => $rmaId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update RMA - `PATCH /return_merchandise_authorisations/{rma_id}`, the `rma_` id and
     *  `{"return_merchandise_authorisation": {...}}` of `rma_date`, `note` and `returns`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateReturnMerchandiseAuthorisation(ExsitedClient $client, int|string $rmaId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(ReturnMerchandiseAuthorisationsUrls::RETURN_MERCHANDISE_AUTHORISATION, pathParams: ['rma_id' => $rmaId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ReturnMerchandiseAuthorisationRead::class);
    }

    /** Approve RMA - `POST /return_merchandise_authorisations/{rma_id}/approve`, no body; `422`
     *  when the RMA holds no pending approval. */
    public static function approveReturnMerchandiseAuthorisation(ExsitedClient $client, int|string $rmaId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendPostRequest(ReturnMerchandiseAuthorisationsUrls::RETURN_MERCHANDISE_AUTHORISATION_APPROVE, pathParams: ['rma_id' => $rmaId], raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ReturnMerchandiseAuthorisationRead::class);
    }

    /** Delete RMA note - `DELETE /return_merchandise_authorisations/{rma_id}/notes/{note_id}`, the
     *  `rma_` id; a code answers `404`. */
    public static function deleteReturnMerchandiseAuthorisationNote(ExsitedClient $client, int|string $rmaId, int|string $noteId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(ReturnMerchandiseAuthorisationsUrls::RETURN_MERCHANDISE_AUTHORISATION_NOTE, pathParams: ['rma_id' => $rmaId, 'note_id' => $noteId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Delete an RMA note attachment - `DELETE
     *  /return_merchandise_authorisations/{rma_id}/notes/{note_id}/files/{file_id}`. */
    public static function deleteReturnMerchandiseAuthorisationNoteFile(ExsitedClient $client, int|string $rmaId, int|string $noteId, int|string $fileId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(ReturnMerchandiseAuthorisationsUrls::RETURN_MERCHANDISE_AUTHORISATION_NOTE_FILE, pathParams: ['rma_id' => $rmaId, 'note_id' => $noteId, 'file_id' => $fileId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Reject RMA - `POST /return_merchandise_authorisations/{rma_id}/reject`, no body; `422` when
     *  the RMA holds no pending approval. */
    public static function rejectReturnMerchandiseAuthorisation(ExsitedClient $client, int|string $rmaId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendPostRequest(ReturnMerchandiseAuthorisationsUrls::RETURN_MERCHANDISE_AUTHORISATION_REJECT, pathParams: ['rma_id' => $rmaId], raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ReturnMerchandiseAuthorisationRead::class);
    }

    /** List RMA notes - `GET /return_merchandise_authorisations/{rma_code}/notes`, by the RMA's
     *  code; an `rma_` id answers `404`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getReturnMerchandiseAuthorisationNotes(ExsitedClient $client, int|string $rmaCode, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ReturnMerchandiseAuthorisationsUrls::RETURN_MERCHANDISE_AUTHORISATION_NOTES_BY_CODE, pathParams: ['rma_code' => $rmaCode], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Get one RMA note - `GET /return_merchandise_authorisations/{rma_code}/notes/{note_id}`, by
     *  the RMA's code.
     *  @param array<string,mixed>|null $queryParams */
    public static function getReturnMerchandiseAuthorisationNote(ExsitedClient $client, int|string $rmaCode, int|string $noteId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ReturnMerchandiseAuthorisationsUrls::RETURN_MERCHANDISE_AUTHORISATION_NOTE_BY_CODE, pathParams: ['rma_code' => $rmaCode, 'note_id' => $noteId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** List an RMA note's attachments - `GET
     *  /return_merchandise_authorisations/{rma_code}/notes/{note_id}/files`, by the code.
     *  @param array<string,mixed>|null $queryParams */
    public static function getReturnMerchandiseAuthorisationNoteFiles(ExsitedClient $client, int|string $rmaCode, int|string $noteId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ReturnMerchandiseAuthorisationsUrls::RETURN_MERCHANDISE_AUTHORISATION_NOTE_FILES_BY_CODE, pathParams: ['rma_code' => $rmaCode, 'note_id' => $noteId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Get one RMA note attachment - `GET
     *  /return_merchandise_authorisations/{rma_code}/notes/{note_id}/files/{file_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getReturnMerchandiseAuthorisationNoteFile(ExsitedClient $client, int|string $rmaCode, int|string $noteId, int|string $fileId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ReturnMerchandiseAuthorisationsUrls::RETURN_MERCHANDISE_AUTHORISATION_NOTE_FILE_BY_CODE, pathParams: ['rma_code' => $rmaCode, 'note_id' => $noteId, 'file_id' => $fileId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** List an RMA's receipts - `GET /return_merchandise_authorisations/{rma_code}/receive`, by
     *  the RMA's code; an `rma_` id answers `404`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getReturnMerchandiseAuthorisationReceive(ExsitedClient $client, int|string $rmaCode, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ReturnMerchandiseAuthorisationsUrls::RETURN_MERCHANDISE_AUTHORISATION_RECEIVE_BY_CODE, pathParams: ['rma_code' => $rmaCode], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: InvoiceReturnMerchandiseAuthorisationReceiveList::class);
    }

    /** Get one RMA receipt - `GET
     *  /return_merchandise_authorisations/{rma_code}/receive/{receive_uuid}`, the `rrma_` id or
     *  the receipt's code, under `receive_rma`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getReturnMerchandiseAuthorisationReceiveByUuid(ExsitedClient $client, int|string $rmaCode, int|string $receiveUuid, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ReturnMerchandiseAuthorisationsUrls::RETURN_MERCHANDISE_AUTHORISATION_RECEIVE_BY_UUID, pathParams: ['rma_code' => $rmaCode, 'receive_uuid' => $receiveUuid], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: InvoiceReturnMerchandiseAuthorisationReceive::class);
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
}
