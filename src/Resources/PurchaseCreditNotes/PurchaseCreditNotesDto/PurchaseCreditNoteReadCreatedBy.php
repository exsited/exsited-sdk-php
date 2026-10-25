<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseCreditNotes\PurchaseCreditNotesDto;

use Exsited\Client\Dto;

/** The `created_by` object of PurchaseCreditNoteRead. */
final class PurchaseCreditNoteReadCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
