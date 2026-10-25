<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseCreditNotes\PurchaseCreditNotesDto;

use Exsited\Sdk\Client\Dto;

/** The `account` object of PurchaseCreditNote. */
final class PurchaseCreditNoteAccount extends Dto
{
    public function __construct(
        public readonly ?string $code = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
