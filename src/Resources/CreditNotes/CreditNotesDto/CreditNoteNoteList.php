<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CreditNotes\CreditNotesDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One page of `CreditNoteNote` records, under `data`. */
final class CreditNoteNoteList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/credit_notes/{credit_note_id}/notes',
    ];

    /** @param list<CreditNoteNote|null>|null $data */
    public function __construct(
        #[ListOf(CreditNoteNote::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
