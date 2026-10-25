<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchasePayments\PurchasePaymentsDto;

use Exsited\Client\Dto;

/** A `PurchasePaymentNoteUpdated`'s `purchase_payment`. */
final class PurchasePaymentNoteUpdatedPurchasePayment extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $object = null,
    ) {
    }
}
