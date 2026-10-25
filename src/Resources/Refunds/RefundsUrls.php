<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Refunds;

final class RefundsUrls
{
    public const REFUNDS = '/api/{api_version}/refunds';
    public const REFUND = '/api/{api_version}/refunds/{refund_id}';
    public const CREDIT_NOTE_REFUNDS = '/api/{api_version}/credit_notes/{credit_note_id}/refunds';
    public const REFUND_NOTES = '/api/{api_version}/refunds/{refund_id}/notes';
    public const REFUND_NOTE = '/api/{api_version}/refunds/{refund_id}/notes/{note_id}';
    public const REFUND_NOTE_FILES = '/api/{api_version}/refunds/{refund_id}/notes/{note_id}/files';
    public const REFUND_NOTE_FILE = '/api/{api_version}/refunds/{refund_id}/notes/{note_id}/files/{file_id}';

    /** The key the `REFUNDS` listing's records sit under. */
    public const REFUNDS_KEY = 'data';

    /** The envelope one `refund` record arrives under. */
    public const REFUND_KEY = 'refund';

    /** The key the `REFUND_NOTES` listing's records sit under. */
    public const REFUND_NOTES_KEY = 'data';

    /** The key the `REFUND_NOTE_FILES` listing's records sit under. */
    public const REFUND_NOTE_FILES_KEY = 'data';

    /** The envelope one `note` record arrives under. */
    public const NOTE_KEY = 'note';

    /** The envelope one `file` record arrives under. */
    public const FILE_KEY = 'file';
}
