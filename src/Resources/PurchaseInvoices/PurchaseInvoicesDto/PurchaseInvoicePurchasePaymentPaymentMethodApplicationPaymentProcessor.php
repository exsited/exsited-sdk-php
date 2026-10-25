<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Sdk\Client\Dto;

/** The `payment_processor` object of PurchaseInvoicePurchasePaymentPaymentMethodApplication. */
final class PurchaseInvoicePurchasePaymentPaymentMethodApplicationPaymentProcessor extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
