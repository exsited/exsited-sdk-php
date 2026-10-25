<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchasePayments\PurchasePaymentsDto;

use Exsited\Client\Dto;

/** A `PurchaseCreditNote`'s `created_by`. */
final class PurchaseCreditNoteCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
