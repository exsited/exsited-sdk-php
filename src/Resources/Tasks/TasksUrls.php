<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Tasks;

final class TasksUrls
{
    public const TASKS = '/api/{api_version}/tasks';
    public const TASK = '/api/{api_version}/tasks/{task_id}';
    public const TASK_CHECKLIST = '/api/{api_version}/tasks/{task_id}/checklist';
    public const TASK_NOTES = '/api/{api_version}/tasks/{task_code}/notes';
    public const TASK_CHECKLIST_BY_UUID = '/api/{api_version}/tasks/{task_id}/checklist/{task_checklist_uuid}';
    public const TASK_NOTE = '/api/{api_version}/tasks/{task_code}/notes/{note_id}';
    public const TASK_NOTE_FILE = '/api/{api_version}/tasks/{task_code}/notes/{note_id}/files/{file_id}';
    public const TASK_NOTE_FILES = '/api/{api_version}/tasks/{task_code}/notes/{note_id}/files';

    /** The key the `TASKS` listing's records sit under. */
    public const TASKS_KEY = 'data';

    /** The key the `TASK_NOTE_FILES` listing's records sit under. */
    public const TASK_NOTE_FILES_KEY = 'data';

    /** The envelope one `work_task` record arrives under. */
    public const WORK_TASK_KEY = 'work_task';

    /** The envelope one `note` record arrives under. */
    public const NOTE_KEY = 'note';

    /** The envelope one `file` record arrives under. */
    public const FILE_KEY = 'file';
}
