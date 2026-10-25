<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchasePayments\PurchasePaymentsDto;

use Exsited\Client\Dto;

/** One entry of the `payment_method_applications` list of PurchasePaymentUpdated. */
final class PurchasePaymentUpdatedPaymentMethodApplication extends Dto
{
    public function __construct(
        public readonly ?string $amount = null,
        public readonly ?PurchasePaymentUpdatedPaymentMethodApplicationPaymentMethod $paymentMethod = null,
        public readonly ?PurchasePaymentUpdatedPaymentMethodApplicationPaymentProcessor $paymentProcessor = null,
        public readonly mixed $reference = null,
    ) {
    }
}
