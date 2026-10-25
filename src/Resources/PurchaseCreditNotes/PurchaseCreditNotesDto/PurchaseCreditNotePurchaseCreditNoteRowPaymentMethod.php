<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseCreditNotes\PurchaseCreditNotesDto;

use Exsited\Client\Dto;

/** The `payment_method` object of PurchaseCreditNotePurchaseCreditNoteRow. */
final class PurchaseCreditNotePurchaseCreditNoteRowPaymentMethod extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
