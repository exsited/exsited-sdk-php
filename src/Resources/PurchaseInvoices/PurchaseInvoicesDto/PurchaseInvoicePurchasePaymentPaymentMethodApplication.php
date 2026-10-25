<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Client\Dto;

/** One entry of the `payment_method_applications` list of PurchaseInvoicePurchasePayment. */
final class PurchaseInvoicePurchasePaymentPaymentMethodApplication extends Dto
{
    public function __construct(
        public readonly ?string $amount = null,
        public readonly ?PurchaseInvoicePurchasePaymentPaymentMethodApplicationPaymentMethod $paymentMethod = null,
        public readonly ?PurchaseInvoicePurchasePaymentPaymentMethodApplicationPaymentProcessor $paymentProcessor = null,
        public readonly ?string $reference = null,
    ) {
    }
}
