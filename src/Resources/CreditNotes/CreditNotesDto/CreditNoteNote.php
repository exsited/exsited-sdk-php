<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CreditNotes\CreditNotesDto;

use Exsited\Sdk\Client\Dto;

/** One note on a credit note, under `note`. */
final class CreditNoteNote extends Dto
{
    public const ENVELOPE_KEY = 'note';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/credit_notes/{credit_note_id}/notes',
        'GET /api/{api_version}/credit_notes/{credit_note_id}/notes/{note_id}',
    ];

    public function __construct(
        /** Empty in every record measured, so its entries are untyped. */
        public readonly ?array $attachments = null,
        public readonly ?string $content = null,
        public readonly ?CreditNoteNoteCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?CreditNoteNoteDetail $creditNote = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $object = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $user = null,
        public readonly ?int $version = null,
        /** Empty in every record measured, so its entries are untyped. */
        public readonly ?array $watchers = null,
    ) {
    }
}
