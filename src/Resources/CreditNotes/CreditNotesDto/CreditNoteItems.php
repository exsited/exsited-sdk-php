<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CreditNotes\CreditNotesDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** A credit note's balance rows, under `credit_note`. */
final class CreditNoteItems extends Dto
{
    public const ENVELOPE_KEY = 'credit_note';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/credit_notes/{credit_note_id}/items',
    ];

    /** @param list<CreditNoteItem|null>|null $items */
    public function __construct(
        public readonly ?string $href = null,
        #[ListOf(CreditNoteItem::class)]
        public readonly ?array $items = null,
        public readonly ?string $object = null,
    ) {
    }
}
