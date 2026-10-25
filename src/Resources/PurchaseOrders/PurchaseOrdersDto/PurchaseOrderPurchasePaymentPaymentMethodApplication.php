<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `payment_method_applications` list of PurchaseOrderPurchasePayment. */
final class PurchaseOrderPurchasePaymentPaymentMethodApplication extends Dto
{
    public function __construct(
        public readonly ?string $amount = null,
        public readonly ?PurchaseOrderPurchasePaymentPaymentMethodApplicationPaymentMethod $paymentMethod = null,
        public readonly ?PurchaseOrderPurchasePaymentPaymentMethodApplicationPaymentProcessor $paymentProcessor = null,
        public readonly ?string $reference = null,
    ) {
    }
}
