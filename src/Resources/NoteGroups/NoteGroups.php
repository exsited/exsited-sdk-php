<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\NoteGroups;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\NoteGroups\NoteGroupsDto\NoteGroup;
use Exsited\Sdk\Resources\NoteGroups\NoteGroupsDto\NoteGroupList;
use Exsited\Sdk\Resources\NoteGroups\NoteGroupsDto\NoteGroupNotes;

/** Note group endpoints, under `/api/{api_version}/note_groups`. */
final class NoteGroups
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List note groups - `GET /note_groups`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getNoteGroups(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(NoteGroupsUrls::NOTE_GROUPS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: NoteGroupList::class);
    }

    /** Create note group - `POST /note_groups`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createNoteGroup(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(NoteGroupsUrls::NOTE_GROUPS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: NoteGroup::class);
    }

    /** Delete note group - `DELETE /note_groups/{note_group_id}`. */
    public static function deleteNoteGroup(ExsitedClient $client, int|string $noteGroupId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(NoteGroupsUrls::NOTE_GROUP, pathParams: ['note_group_id' => $noteGroupId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Get note group - `GET /note_groups/{note_group_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getNoteGroup(ExsitedClient $client, int|string $noteGroupId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(NoteGroupsUrls::NOTE_GROUP, pathParams: ['note_group_id' => $noteGroupId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: NoteGroup::class);
    }

    /** Update note group - `PATCH /note_groups/{note_group_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateNoteGroup(ExsitedClient $client, int|string $noteGroupId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(NoteGroupsUrls::NOTE_GROUP, pathParams: ['note_group_id' => $noteGroupId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: NoteGroup::class);
    }

    /** List group notes - `GET /note_groups/{note_group_id}/notes`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getNoteGroupNotes(ExsitedClient $client, int|string $noteGroupId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(NoteGroupsUrls::NOTE_GROUP_NOTES, pathParams: ['note_group_id' => $noteGroupId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: NoteGroupNotes::class);
    }

    /** List a group's notes as one of its users sees them - `GET
     *  /note_groups/{note_group_id}/notes/user/{note_user}`; `note_user` is the note user's uuid
     *  or what it was added as: an entity's uuid, or a manual user's email address.
     *  @param array<string,mixed>|null $queryParams */
    public static function getNoteGroupNotesByUser(ExsitedClient $client, int|string $noteGroupId, int|string $noteUser, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(NoteGroupsUrls::NOTE_GROUP_NOTES_BY_USER, pathParams: ['note_group_id' => $noteGroupId, 'note_user' => $noteUser], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
