<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchasePayments\PurchasePaymentsDto;

use Exsited\Sdk\Client\Dto;

/** A `PurchasePaymentNoteUpdated`'s `created_by` and `last_updated_by`. */
final class PurchasePaymentNoteUpdatedUser extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
