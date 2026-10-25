<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseCreditNotes;

final class PurchaseCreditNotesUrls
{
    public const PURCHASE_CREDIT_NOTES = '/api/{api_version}/purchase_credit_notes';
    public const PURCHASE_CREDIT_NOTE = '/api/{api_version}/purchase_credit_notes/{purchase_credit_note_id}';
    public const PURCHASE_CREDIT_NOTE_APPLY = '/api/{api_version}/purchase_credit_notes/{purchase_credit_note_id}/apply';
    public const PURCHASE_CREDIT_NOTE_NOTES = '/api/{api_version}/purchase_credit_notes/{purchase_credit_note_id}/notes';
    public const PURCHASE_CREDIT_NOTE_NOTE = '/api/{api_version}/purchase_credit_notes/{purchase_credit_note_id}/notes/{note_id}';

    /** The key the `PURCHASE_CREDIT_NOTES` listing's records sit under. */
    public const PURCHASE_CREDIT_NOTES_KEY = 'data';

    /** The envelope one `purchase_credit_note` record arrives under. */
    public const PURCHASE_CREDIT_NOTE_KEY = 'purchase_credit_note';

    /** The envelope one `note` record arrives under. */
    public const NOTE_KEY = 'note';
}
