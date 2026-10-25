<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchasePayments\PurchasePaymentsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `payment_method_applications` list of PurchasePaymentRead. */
final class PurchasePaymentReadPaymentMethodApplication extends Dto
{
    public function __construct(
        public readonly ?string $amount = null,
        public readonly ?PurchasePaymentReadPaymentMethodApplicationPaymentMethod $paymentMethod = null,
        public readonly ?PurchasePaymentReadPaymentMethodApplicationPaymentProcessor $paymentProcessor = null,
        public readonly ?string $reference = null,
    ) {
    }
}
