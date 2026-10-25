<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Client\Dto;

/** The `fields` object of PurchaseInvoicePurchasePaymentLastUpdatedBy. */
final class PurchaseInvoicePurchasePaymentLastUpdatedByFields extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
