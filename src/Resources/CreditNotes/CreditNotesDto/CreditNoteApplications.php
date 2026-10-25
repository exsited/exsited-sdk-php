<?php

declare(strict_types=1);

namespace Exsited\Resources\CreditNotes\CreditNotesDto;

use Exsited\Client\Dto;

/** A credit note's applications, under `credit_note`. */
final class CreditNoteApplications extends Dto
{
    public const ENVELOPE_KEY = 'credit_note';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/credit_notes/{credit_note_id}/credit_note_applications',
    ];

    public function __construct(
        /** Empty in every record measured, so its entries are untyped. */
        public readonly ?array $applications = null,
        public readonly ?string $href = null,
        public readonly ?string $object = null,
    ) {
    }
}
