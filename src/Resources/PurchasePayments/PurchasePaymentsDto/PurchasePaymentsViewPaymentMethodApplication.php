<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchasePayments\PurchasePaymentsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `payment_method_applications` list of PurchasePaymentsView. */
final class PurchasePaymentsViewPaymentMethodApplication extends Dto
{
    public function __construct(
        public readonly ?string $amount = null,
        public readonly ?PurchasePaymentsViewPaymentMethodApplicationPaymentMethod $paymentMethod = null,
        public readonly ?PurchasePaymentsViewPaymentMethodApplicationPaymentProcessor $paymentProcessor = null,
        public readonly ?string $reference = null,
    ) {
    }
}
