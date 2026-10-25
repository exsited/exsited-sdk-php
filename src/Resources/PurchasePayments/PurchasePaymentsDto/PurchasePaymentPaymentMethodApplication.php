<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchasePayments\PurchasePaymentsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `payment_method_applications` list of PurchasePayment. */
final class PurchasePaymentPaymentMethodApplication extends Dto
{
    public function __construct(
        public readonly ?string $amount = null,
        public readonly ?PurchasePaymentPaymentMethodApplicationPaymentMethod $paymentMethod = null,
        public readonly ?PurchasePaymentPaymentMethodApplicationPaymentProcessor $paymentProcessor = null,
        public readonly ?string $reference = null,
    ) {
    }
}
