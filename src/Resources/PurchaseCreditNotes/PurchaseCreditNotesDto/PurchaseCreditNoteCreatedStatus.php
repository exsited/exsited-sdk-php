<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseCreditNotes\PurchaseCreditNotesDto;

use Exsited\Client\Dto;

/** A `PurchaseCreditNoteCreated`'s `status`. */
final class PurchaseCreditNoteCreatedStatus extends Dto
{
    public function __construct(
        public readonly ?string $key = null,
        public readonly ?string $value = null,
    ) {
    }
}
