<?php

declare(strict_types=1);

namespace Exsited\Resources\NoteAttachments;

use Exsited\Client\ApiResponse;
use Exsited\Client\ExsitedClient;
use Exsited\Resources\NoteAttachments\NoteAttachmentsDto\NoteAttachment;

/** Note attachment endpoints, under `/api/{api_version}/note_attachment`. */
final class NoteAttachments
{
    /** Any note's attachment as base64 - `GET /note_attachment/{attachment_uuid}`, the `uuid` a
     *  note's `attachments` entry carries, whatever the note is attached to.
     *  @param array<string,mixed>|null $queryParams */
    public static function getNoteAttachment(ExsitedClient $client, int|string $attachmentUuid, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(NoteAttachmentsUrls::NOTE_ATTACHMENT, pathParams: ['attachment_uuid' => $attachmentUuid], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: NoteAttachment::class);
    }
}
