<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomComponents;

use Closure;
use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\CustomComponents\CustomComponentsDto\Component;
use Exsited\Sdk\Resources\CustomComponents\CustomComponentsDto\ComponentByUuid;
use Exsited\Sdk\Resources\CustomComponents\CustomComponentsDto\ComponentList;
use Exsited\Sdk\Resources\CustomComponents\CustomComponentsDto\ComponentObject;
use Exsited\Sdk\Resources\CustomComponents\CustomComponentsDto\ComponentObjectActivity;
use Exsited\Sdk\Resources\CustomComponents\CustomComponentsDto\ComponentObjectActivityEntry;
use Exsited\Sdk\Resources\CustomComponents\CustomComponentsDto\ComponentObjectCustomObjects;
use Exsited\Sdk\Resources\CustomComponents\CustomComponentsDto\ComponentObjectNote;
use Exsited\Sdk\Resources\CustomComponents\CustomComponentsDto\ComponentObjectNoteFile;
use Exsited\Sdk\Resources\CustomComponents\CustomComponentsDto\ComponentObjectNoteFiles;
use Exsited\Sdk\Resources\CustomComponents\CustomComponentsDto\ComponentObjectNotes;
use Exsited\Sdk\Resources\CustomComponents\CustomComponentsDto\ComponentObjectRecord;
use Exsited\Sdk\Resources\CustomComponents\CustomComponentsDto\ComponentObjects;

/** Custom component endpoints, under `/api/{api_version}`. */
final class CustomComponents
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List all component definitions - `GET /component`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getComponent(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CustomComponentsUrls::COMPONENT, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ComponentList::class);
    }

    /** Single component definition - `GET /component/{component_uuid}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getComponentByUuid(ExsitedClient $client, int|string $componentUuid, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CustomComponentsUrls::COMPONENT_BY_UUID, pathParams: ['component_uuid' => $componentUuid], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: Component::class);
    }

    /** Create new instance - `POST /component/{component_uuid}`; answered under
     *  the component's name.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createComponentByUuid(ExsitedClient $client, int|string $componentUuid, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(CustomComponentsUrls::COMPONENT_BY_UUID, pathParams: ['component_uuid' => $componentUuid], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: self::instanceView($payload));
    }

    /** Delete instance - `DELETE /component/{component_uuid}/{component_object_id}`. */
    public static function deleteComponentById(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(CustomComponentsUrls::COMPONENT_BY_ID, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update instance - `PATCH /component/{component_uuid}/{component_object_id}`;
     *  answered under the component's name.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateComponentById(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(CustomComponentsUrls::COMPONENT_BY_ID, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: self::instanceView($payload));
    }

    /** List all instances - `GET /components/{component_uuid}/objects`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getComponentObjects(ExsitedClient $client, int|string $componentUuid, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CustomComponentsUrls::COMPONENT_OBJECTS, pathParams: ['component_uuid' => $componentUuid], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ComponentObjects::class);
    }

    /** Single instance - `GET /components/{component_uuid}/objects/{component_object_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getComponentObject(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CustomComponentsUrls::COMPONENT_OBJECT, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ComponentObject::class);
    }

    /** Activity log - `GET /components/{component_uuid}/objects/{component_object_id}/activity`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getComponentObjectActivity(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CustomComponentsUrls::COMPONENT_OBJECT_ACTIVITY, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ComponentObjectActivity::class);
    }

    /** `GET /components/{component_uuid}/objects/{component_object_id}/custom _objects`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getComponentObjectCustomObjects(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CustomComponentsUrls::COMPONENT_OBJECT_CUSTOM_OBJECTS, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ComponentObjectCustomObjects::class);
    }

    /** PDF descriptor - `GET /components/{component_uuid}/objects/{component_object_id}/pdf`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getComponentObjectPdf(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CustomComponentsUrls::COMPONENT_OBJECT_PDF, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Create a component definition - `POST /component`, under `component`; `name` is required,
     *  and `use_in` asks for `relation` beside it.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createComponent(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(CustomComponentsUrls::COMPONENT, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: Component::class);
    }

    /** Update a component definition - `PATCH /component/{component_uuid}`, the `cmp_` id, under
     *  `component`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateComponent(ExsitedClient $client, int|string $componentUuid, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(CustomComponentsUrls::COMPONENT_BY_UUID, pathParams: ['component_uuid' => $componentUuid], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: Component::class);
    }

    /** Delete a component definition - `DELETE /component/{component_uuid}`, the `cmp_` id;
     *  answered `204`. */
    public static function deleteComponent(ExsitedClient $client, int|string $componentUuid, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(CustomComponentsUrls::COMPONENT_BY_UUID, pathParams: ['component_uuid' => $componentUuid], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Create an instance on v4 - `POST /components/{component_uuid}/objects`, under
     *  `custom_component_object`; every key is optional, and `parents` names the owner.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createComponentObject(ExsitedClient $client, int|string $componentUuid, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(CustomComponentsUrls::COMPONENT_OBJECTS, pathParams: ['component_uuid' => $componentUuid], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ComponentObjectRecord::class);
    }

    /** Update an instance on v4 - `PATCH
     *  /components/{component_uuid}/objects/{component_object_id}`; `version_id` must match when
     *  sent, and `code`, `parents` and `custom_form` are refused.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateComponentObject(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(CustomComponentsUrls::COMPONENT_OBJECT, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ComponentObjectRecord::class);
    }

    /** Delete an instance on v4 - `DELETE
     *  /components/{component_uuid}/objects/{component_object_id}`; answered `204`. */
    public static function deleteComponentObject(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(CustomComponentsUrls::COMPONENT_OBJECT, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Log an activity - `POST
     *  /components/{component_uuid}/objects/{component_object_id}/activity`, under
     *  `custom_component_object_activity` with `type`, `message` and `user_name`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createComponentObjectActivity(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(CustomComponentsUrls::COMPONENT_OBJECT_ACTIVITY, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ComponentObjectActivityEntry::class);
    }

    /** One activity - `GET
     *  /components/{component_uuid}/objects/{component_object_id}/activity/{activity_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getComponentObjectActivityById(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, int|string $activityId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CustomComponentsUrls::COMPONENT_OBJECT_ACTIVITY_ENTRY, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId, 'activity_id' => $activityId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ComponentObjectActivityEntry::class);
    }

    /** List workflow milestones - `GET
     *  /components/{component_uuid}/objects/{component_object_id}/milestones`; the listing has
     *  only been seen empty, so `->dto` is null.
     *  @param array<string,mixed>|null $queryParams */
    public static function getComponentObjectMilestones(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CustomComponentsUrls::COMPONENT_OBJECT_MILESTONES, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** One workflow milestone - `GET
     *  /components/{component_uuid}/objects/{component_object_id}/milestones/{milestone_id}`, the
     *  `wfm_` id.
     *  @param array<string,mixed>|null $queryParams */
    public static function getComponentObjectMilestone(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, int|string $milestoneId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CustomComponentsUrls::COMPONENT_OBJECT_MILESTONE, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId, 'milestone_id' => $milestoneId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** List workflow history - `GET
     *  /components/{component_uuid}/objects/{component_object_id}/history`; the listing has only
     *  been seen empty, so `->dto` is null.
     *  @param array<string,mixed>|null $queryParams */
    public static function getComponentObjectHistory(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CustomComponentsUrls::COMPONENT_OBJECT_HISTORY, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** One workflow history entry - `GET
     *  /components/{component_uuid}/objects/{component_object_id}/history/{history_id}`, the
     *  `wfh_` id.
     *  @param array<string,mixed>|null $queryParams */
    public static function getComponentObjectHistoryById(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, int|string $historyId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CustomComponentsUrls::COMPONENT_OBJECT_HISTORY_ENTRY, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId, 'history_id' => $historyId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** List notes - `GET /components/{component_uuid}/objects/{component_object_id}/notes`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getComponentObjectNotes(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CustomComponentsUrls::COMPONENT_OBJECT_NOTES, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ComponentObjectNotes::class);
    }

    /** One note - `GET
     *  /components/{component_uuid}/objects/{component_object_id}/notes/{note_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getComponentObjectNote(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, int|string $noteId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CustomComponentsUrls::COMPONENT_OBJECT_NOTE, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId, 'note_id' => $noteId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ComponentObjectNote::class);
    }

    /** List a note's files - `GET
     *  /components/{component_uuid}/objects/{component_object_id}/notes/{note_id}/files`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getComponentObjectNoteFiles(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, int|string $noteId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CustomComponentsUrls::COMPONENT_OBJECT_NOTE_FILES, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId, 'note_id' => $noteId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ComponentObjectNoteFiles::class);
    }

    /** One file of a note - `GET /components/{component_uuid}/objects/{component_object_id}`
     *  `/notes/{note_id}/files/{file_id}`, the attachment's `uuid`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getComponentObjectNoteFile(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, int|string $noteId, int|string $fileId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CustomComponentsUrls::COMPONENT_OBJECT_NOTE_FILE, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId, 'note_id' => $noteId, 'file_id' => $fileId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ComponentObjectNoteFile::class);
    }

    /** Attach a note - `POST /components/{component_uuid}/objects/{component_object_id}/notes`; a
     *  form, the text as the `note` field with any `files` beside it.
     *  @param array<string,mixed>|null $files the file parts, as the client's `files` takes them */
    public static function createComponentObjectNote(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, string $note, ?array $files = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requireNote($note);
        return $client->sendPostRequest(CustomComponentsUrls::COMPONENT_OBJECT_NOTES, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId], formData: ['note' => $note], files: $files, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ComponentObjectNote::class);
    }

    /** Update a note - `PATCH
     *  /components/{component_uuid}/objects/{component_object_id}/notes/{note_id}`; a form, as the
     *  create is.
     *  @param array<string,mixed>|null $files the file parts, as the client's `files` takes them */
    public static function updateComponentObjectNote(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, int|string $noteId, string $note, ?array $files = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requireNote($note);
        return $client->sendPatchRequest(CustomComponentsUrls::COMPONENT_OBJECT_NOTE, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId, 'note_id' => $noteId], formData: ['note' => $note], files: $files, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ComponentObjectNote::class);
    }

    /** Delete a note - `DELETE
     *  /components/{component_uuid}/objects/{component_object_id}/notes/{note_id}`; answered
     *  `204`. */
    public static function deleteComponentObjectNote(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, int|string $noteId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(CustomComponentsUrls::COMPONENT_OBJECT_NOTE, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId, 'note_id' => $noteId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Delete a note's file - `DELETE /components/{component_uuid}/objects/{component_object_id}`
     *  `/notes/{note_id}/files/{file_id}`, the attachment's `uuid`; answered `204`. */
    public static function deleteComponentObjectNoteFile(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, int|string $noteId, int|string $fileId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(CustomComponentsUrls::COMPONENT_OBJECT_NOTE_FILE, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId, 'note_id' => $noteId, 'file_id' => $fileId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** One custom object schema with its instances - `GET /components/{component_uuid}/objects`
     *  `/{component_object_id}/custom_objects/{custom_object_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getComponentObjectCustomObject(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, int|string $customObjectId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CustomComponentsUrls::COMPONENT_OBJECT_CUSTOM_OBJECT, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId, 'custom_object_id' => $customObjectId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Create a custom object instance - `POST /components/{component_uuid}/objects`
     *  `/{component_object_id}/custom_objects/{custom_object_id}`, under `custom_object_instances`
     *  with an `attributes` list; the path has no `instances` segment.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createComponentObjectCustomObjectInstance(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, int|string $customObjectId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(CustomComponentsUrls::COMPONENT_OBJECT_CUSTOM_OBJECT, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId, 'custom_object_id' => $customObjectId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** One custom object instance - `GET /components/{component_uuid}/objects`
     *  `/{component_object_id}/custom_objects/{custom_object_id}/instances/{instance_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getComponentObjectCustomObjectInstance(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, int|string $customObjectId, int|string $instanceId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CustomComponentsUrls::COMPONENT_OBJECT_CUSTOM_OBJECT_INSTANCE, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId, 'custom_object_id' => $customObjectId, 'instance_id' => $instanceId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update a custom object instance - `PATCH /components/{component_uuid}/objects`
     *  `/{component_object_id}/custom_objects/{custom_object_id}/instances/{instance_id}`, under
     *  `custom_object_instance` with an `attributes` list.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateComponentObjectCustomObjectInstance(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, int|string $customObjectId, int|string $instanceId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(CustomComponentsUrls::COMPONENT_OBJECT_CUSTOM_OBJECT_INSTANCE, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId, 'custom_object_id' => $customObjectId, 'instance_id' => $instanceId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Delete a custom object instance - `DELETE /components/{component_uuid}/objects`
     *  `/{component_object_id}/custom_objects/{custom_object_id}/instances/{instance_id}`. */
    public static function deleteComponentObjectCustomObjectInstance(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, int|string $customObjectId, int|string $instanceId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(CustomComponentsUrls::COMPONENT_OBJECT_CUSTOM_OBJECT_INSTANCE, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId, 'custom_object_id' => $customObjectId, 'instance_id' => $instanceId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Link accounts or orders - `POST
     *  /components/{component_uuid}/objects/{component_object_id}/link_domains`, under
     *  `custom_component_object` with `domain_type` and `domains[].domain_id`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function linkComponentObjectDomains(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(CustomComponentsUrls::COMPONENT_OBJECT_LINK_DOMAINS, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ComponentObjectRecord::class);
    }

    /** Replace the linked accounts or orders - `PATCH
     *  /components/{component_uuid}/objects/{component_object_id}/link_domains`; a domain left out
     *  of `domains` is unlinked.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateComponentObjectDomains(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(CustomComponentsUrls::COMPONENT_OBJECT_LINK_DOMAINS, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ComponentObjectRecord::class);
    }

    /** Unlink accounts or orders - `POST
     *  /components/{component_uuid}/objects/{component_object_id}/unlink_domains`; a domain that
     *  is not linked is refused.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function unlinkComponentObjectDomains(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(CustomComponentsUrls::COMPONENT_OBJECT_UNLINK_DOMAINS, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ComponentObjectRecord::class);
    }

    /** Move an instance through its workflow - `POST
     *  /components/{component_uuid}/objects/{component_object_id}/change_status`, under
     *  `custom_component_object` with `workflow_status`; runs the transition at once.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function changeComponentObjectStatus(ExsitedClient $client, int|string $componentUuid, int|string $componentObjectId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(CustomComponentsUrls::COMPONENT_OBJECT_CHANGE_STATUS, pathParams: ['component_uuid' => $componentUuid, 'component_object_id' => $componentObjectId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ComponentObjectRecord::class);
    }

    /** The instance view, read under the one key the payload names, which the answer is keyed by too.
     *  @param array<string,mixed>|string|Dto $payload
     *  @return class-string<ComponentByUuid>|(Closure(array<string,mixed>): ComponentByUuid) */
    private static function instanceView(array|string|Dto $payload): string|Closure
    {
        $body = match (true) {
            $payload instanceof Dto => $payload->toMap(),
            is_string($payload) => json_decode($payload, true),
            default => $payload,
        };
        if (!is_array($body) || count($body) !== 1 || !is_string(array_key_first($body))) {
            return ComponentByUuid::class;
        }
        $name = array_key_first($body);
        return static fn (array $map): ComponentByUuid => ComponentByUuid::fromMap(
            is_array($map[$name] ?? null) ? $map[$name] : $map
        );
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
