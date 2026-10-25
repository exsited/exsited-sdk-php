<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseCreditNotes\PurchaseCreditNotesDto;

use Exsited\Client\Dto;

/** The `last_updated_by` object of PurchaseCreditNoteRead. */
final class PurchaseCreditNoteReadLastUpdatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
