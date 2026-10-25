<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Orders\OrdersDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `payment_methods` list of OrderPaymentMethods. */
final class OrderPaymentMethodsPaymentMethod extends Dto
{
    public function __construct(
        public readonly ?string $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?bool $default = null,
        public readonly ?string $id = null,
        public readonly ?string $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly mixed $lastUsedAt = null,
        public readonly ?string $object = null,
        public readonly ?int $paymentCount = null,
        public readonly ?OrderPaymentMethodsPaymentMethodProcessor $processor = null,
        public readonly ?string $processorType = null,
        public readonly ?string $reference = null,
        public readonly ?bool $restrictedToOrders = null,
        public readonly ?string $specifiedOrderIds = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
