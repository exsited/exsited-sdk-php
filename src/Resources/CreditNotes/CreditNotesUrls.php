<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CreditNotes;

final class CreditNotesUrls
{
    public const CREDIT_NOTES = '/api/{api_version}/credit_notes';
    public const CREDIT_NOTE = '/api/{api_version}/credit_notes/{credit_note_id}';
    public const CREDIT_NOTE_APPLY = '/api/{api_version}/credit_notes/{credit_note_id}/apply';
    public const CREDIT_NOTE_ITEMS = '/api/{api_version}/credit_notes/{credit_note_id}/items';
    public const CREDIT_NOTE_CREDIT_NOTE_APPLICATIONS = '/api/{api_version}/credit_notes/{credit_note_id}/credit_note_applications';
    public const CREDIT_NOTE_NOTES = '/api/{api_version}/credit_notes/{credit_note_id}/notes';
    public const CREDIT_NOTE_NOTE = '/api/{api_version}/credit_notes/{credit_note_id}/notes/{note_id}';
    public const CREDIT_NOTE_NOTE_FILES = '/api/{api_version}/credit_notes/{credit_note_id}/notes/{note_id}/files';
    public const CREDIT_NOTE_NOTE_FILE = '/api/{api_version}/credit_notes/{credit_note_id}/notes/{note_id}/files/{file_id}';

    /** The key the `CREDIT_NOTES` listing's records sit under. */
    public const CREDIT_NOTES_KEY = 'data';

    /** The envelope one `credit_note` record arrives under. */
    public const CREDIT_NOTE_KEY = 'credit_note';

    /** The key the `CREDIT_NOTE_NOTES` listing's records sit under. */
    public const CREDIT_NOTE_NOTES_KEY = 'data';

    /** The key the `CREDIT_NOTE_NOTE_FILES` listing's records sit under. */
    public const CREDIT_NOTE_NOTE_FILES_KEY = 'data';

    /** The envelope one `note` record arrives under. */
    public const NOTE_KEY = 'note';

    /** The envelope one `file` record arrives under. */
    public const FILE_KEY = 'file';
}
