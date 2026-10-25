<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Tasks;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\Tasks\TasksDto\TaskList;
use Exsited\Sdk\Resources\Tasks\TasksDto\TaskNoteList;
use Exsited\Sdk\Resources\Tasks\TasksDto\TaskView;

/** Task endpoints, under `/api/{api_version}`. */
final class Tasks
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List all tasks - `GET /tasks`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getTasks(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(TasksUrls::TASKS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: TaskList::class);
    }

    /** Delete task - `DELETE /tasks/{task_id}`. */
    public static function deleteTask(ExsitedClient $client, int|string $taskId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(TasksUrls::TASK, pathParams: ['task_id' => $taskId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Get single task - `GET /tasks/{task_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getTask(ExsitedClient $client, int|string $taskId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(TasksUrls::TASK, pathParams: ['task_id' => $taskId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: TaskView::class);
    }

    /** Update task - `PATCH /tasks/{task_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateTask(ExsitedClient $client, int|string $taskId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(TasksUrls::TASK, pathParams: ['task_id' => $taskId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: TaskView::class);
    }

    /** List checklist items - `GET /tasks/{task_id}/checklist`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getTaskChecklist(ExsitedClient $client, int|string $taskId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(TasksUrls::TASK_CHECKLIST, pathParams: ['task_id' => $taskId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: TaskView::class);
    }

    /** Add checklist item - `POST /tasks/{task_id}/checklist`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createTaskChecklist(ExsitedClient $client, int|string $taskId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(TasksUrls::TASK_CHECKLIST, pathParams: ['task_id' => $taskId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: TaskView::class);
    }

    /** List task notes - `GET /tasks/{task_code}/notes`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getTaskNotes(ExsitedClient $client, int|string $taskId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(TasksUrls::TASK_NOTES, pathParams: ['task_code' => $taskId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: TaskNoteList::class);
    }

    /** Add note - `POST /tasks/{task_code}/notes`.
     *  Sent as a form: the text as the `note` field, with any `$files` as multipart parts.
     *  @param array<string,mixed>|null $files the file parts, as the client's `files` takes them */
    public static function createTaskNote(ExsitedClient $client, int|string $taskId, string $note, ?array $files = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requireNote($note);
        return $client->sendPostRequest(TasksUrls::TASK_NOTES, pathParams: ['task_code' => $taskId], formData: ['note' => $note], files: $files, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Get single checklist item - `GET /tasks/{task_id}/checklist/{task_checklist_uuid}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getTaskChecklistByUuid(ExsitedClient $client, int|string $taskId, int|string $taskChecklistUuid, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(TasksUrls::TASK_CHECKLIST_BY_UUID, pathParams: ['task_id' => $taskId, 'task_checklist_uuid' => $taskChecklistUuid], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: TaskView::class);
    }

    /** Delete note [V4 N/A - 405] - `DELETE /tasks/{task_code}/notes/{note_id}`. */
    public static function deleteTaskNote(ExsitedClient $client, int|string $taskId, int|string $taskNoteId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(TasksUrls::TASK_NOTE, pathParams: ['task_code' => $taskId, 'note_id' => $taskNoteId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Create task - `POST /tasks`, `{"work_task": {...}}`, `name` required and unknown keys
     *  refused; `201` with the task as `getTask` reads it.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createTask(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(TasksUrls::TASKS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: TaskView::class);
    }

    /** Delete one checklist item - `DELETE /tasks/{task_id}/checklist/{task_checklist_uuid}`;
     *  `409` once the item is `COMPLETED`. */
    public static function deleteTaskChecklistByUuid(ExsitedClient $client, int|string $taskId, int|string $taskChecklistUuid, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(TasksUrls::TASK_CHECKLIST_BY_UUID, pathParams: ['task_id' => $taskId, 'task_checklist_uuid' => $taskChecklistUuid], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Edit one checklist item - `PATCH /tasks/{task_id}/checklist/{task_checklist_uuid}`,
     *  `{"checklist": {...}}`; the task's id or code, and the whole task back.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateTaskChecklistByUuid(ExsitedClient $client, int|string $taskId, int|string $taskChecklistUuid, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(TasksUrls::TASK_CHECKLIST_BY_UUID, pathParams: ['task_id' => $taskId, 'task_checklist_uuid' => $taskChecklistUuid], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: TaskView::class);
    }

    /** Delete one attachment - `DELETE /tasks/{task_code}/notes/{note_id}/files/{file_id}`, by the
     *  task's code and the file's `uuid`. */
    public static function deleteTaskNoteFile(ExsitedClient $client, int|string $taskCode, int|string $noteId, int|string $fileId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(TasksUrls::TASK_NOTE_FILE, pathParams: ['task_code' => $taskCode, 'note_id' => $noteId, 'file_id' => $fileId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** List a note's attachments - `GET /tasks/{task_code}/notes/{note_id}/files`, by the task's
     *  code.
     *  @param array<string,mixed>|null $queryParams */
    public static function getTaskNoteFiles(ExsitedClient $client, int|string $taskCode, int|string $noteId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(TasksUrls::TASK_NOTE_FILES, pathParams: ['task_code' => $taskCode, 'note_id' => $noteId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Get one attachment - `GET /tasks/{task_code}/notes/{note_id}/files/{file_id}`, the `uuid`
     *  the files listing gives; a JSON descriptor under `file`, not the bytes.
     *  @param array<string,mixed>|null $queryParams */
    public static function getTaskNoteFile(ExsitedClient $client, int|string $taskCode, int|string $noteId, int|string $fileId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(TasksUrls::TASK_NOTE_FILE, pathParams: ['task_code' => $taskCode, 'note_id' => $noteId, 'file_id' => $fileId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Get one note - `GET /tasks/{task_code}/notes/{note_id}`, by the task's code; a `wt_` id
     *  answers `404`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getTaskNote(ExsitedClient $client, int|string $taskCode, int|string $noteId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(TasksUrls::TASK_NOTE, pathParams: ['task_code' => $taskCode, 'note_id' => $noteId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update a note's text - `PATCH /tasks/{task_code}/notes/{note_id}`; a form, as the create
     *  is, by the task's code.
     *  @param array<string,mixed>|null $files the file parts, as the client's `files` takes them */
    public static function updateTaskNote(ExsitedClient $client, int|string $taskCode, int|string $noteId, string $note, ?array $files = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requireNote($note);
        return $client->sendPatchRequest(TasksUrls::TASK_NOTE, pathParams: ['task_code' => $taskCode, 'note_id' => $noteId], formData: ['note' => $note], files: $files, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
