<?php

declare(strict_types=1);

namespace Exsited\Resources\ItemFulfillments;

use Exsited\Client\ApiResponse;
use Exsited\Client\Dto;
use Exsited\Client\ExsitedClient;
use Exsited\Errors\SdkUsageError;
use Exsited\Resources\ItemFulfillments\ItemFulfillmentsDto\ItemFulfillmentList;
use Exsited\Resources\ItemFulfillments\ItemFulfillmentsDto\ItemFulfillmentNoteList;
use Exsited\Resources\ItemFulfillments\ItemFulfillmentsDto\ItemFulfillmentNoteRead;
use Exsited\Resources\ItemFulfillments\ItemFulfillmentsDto\ItemFulfillmentNotes;
use Exsited\Resources\ItemFulfillments\ItemFulfillmentsDto\ItemFulfillmentRead;
use Exsited\Resources\ItemFulfillments\ItemFulfillmentsDto\ItemFulfillmentUpdated;
use Exsited\Resources\ItemFulfillments\ItemFulfillmentsDto\ItemFulfillmentsView;

/** Item fulfillment endpoints, under `/api/{api_version}`. */
final class ItemFulfillments
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List item fulfilments - `GET /item_fulfillments`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getItemFulfillments(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ItemFulfillmentsUrls::ITEM_FULFILLMENTS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemFulfillmentList::class);
    }

    /** Create fulfillment - `POST /item_fulfillments`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createItemFulfillment(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ItemFulfillmentsUrls::ITEM_FULFILLMENTS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemFulfillmentsView::class);
    }

    /** Fulfillment details - `GET /item_fulfillments/{fulfillment_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getItemFulfillment(ExsitedClient $client, int|string $fulfillmentId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ItemFulfillmentsUrls::ITEM_FULFILLMENT, pathParams: ['fulfillment_id' => $fulfillmentId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemFulfillmentRead::class);
    }

    /** Update fulfillment - `PATCH /item_fulfillments/{fulfillment_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateItemFulfillment(ExsitedClient $client, int|string $fulfillmentId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(ItemFulfillmentsUrls::ITEM_FULFILLMENT, pathParams: ['fulfillment_id' => $fulfillmentId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemFulfillmentUpdated::class);
    }

    /** Create note - `POST /item_fulfillments/{fulfillment_id}/notes`.
     *  Sent as a form: the text as the `note` field, with any `$files` as multipart parts.
     *  @param array<string,mixed>|null $files the file parts, as the client's `files` takes them */
    public static function createItemFulfillmentNote(ExsitedClient $client, int|string $fulfillmentId, string $note, ?array $files = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requireNote($note);
        return $client->sendPostRequest(ItemFulfillmentsUrls::ITEM_FULFILLMENT_NOTES, pathParams: ['fulfillment_id' => $fulfillmentId], formData: ['note' => $note], files: $files, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemFulfillmentNotes::class);
    }

    /** Delete fulfillment - `DELETE /item_fulfillments/{fulfillment_id}`, by its `ifm_` id;
     *  refused `400` `stock_committed` once any of its stock has been sent. */
    public static function deleteItemFulfillment(ExsitedClient $client, int|string $fulfillmentId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(ItemFulfillmentsUrls::ITEM_FULFILLMENT, pathParams: ['fulfillment_id' => $fulfillmentId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Delete fulfillment note - `DELETE /item_fulfillments/{fulfillment_id}/notes/{note_id}`,
     *  `ifm_` and `note_` ids; it looks on the fulfillment, where the create never puts one. */
    public static function deleteItemFulfillmentNote(ExsitedClient $client, int|string $fulfillmentId, int|string $noteId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(ItemFulfillmentsUrls::ITEM_FULFILLMENT_NOTE, pathParams: ['fulfillment_id' => $fulfillmentId, 'note_id' => $noteId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** List fulfillment notes - `GET /item_fulfillments/{fulfillment_id}/notes`; the notes of the
     *  fulfillment's sale invoice, which is where `createItemFulfillmentNote` puts them.
     *  @param array<string,mixed>|null $queryParams */
    public static function getItemFulfillmentNotes(ExsitedClient $client, int|string $fulfillmentId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ItemFulfillmentsUrls::ITEM_FULFILLMENT_NOTES, pathParams: ['fulfillment_id' => $fulfillmentId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemFulfillmentNoteList::class);
    }

    /** Get one fulfillment note - `GET /item_fulfillments/{fulfillment_id}/notes/{note_id}`,
     *  answered under `item_fulfillment.note`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getItemFulfillmentNote(ExsitedClient $client, int|string $fulfillmentId, int|string $noteId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ItemFulfillmentsUrls::ITEM_FULFILLMENT_NOTE, pathParams: ['fulfillment_id' => $fulfillmentId, 'note_id' => $noteId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ItemFulfillmentNoteRead::class);
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
