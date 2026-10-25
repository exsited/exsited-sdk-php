<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchasePayments\PurchasePaymentsDto;

use Exsited\Client\Dto;

/** A `PurchasePaymentNoteUpdated`'s `created_by` and `last_updated_by`. */
final class PurchasePaymentNoteUpdatedUser extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
