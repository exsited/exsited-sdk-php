<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Bookings\BookingsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of a `BookingPaymentMethods`'s `payment_methods`. */
final class BookingPaymentMethodsPaymentMethod extends Dto
{
    public function __construct(
        public readonly ?string $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?bool $default = null,
        public readonly ?string $id = null,
        public readonly ?string $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $lastUsedAt = null,
        public readonly ?string $object = null,
        public readonly ?int $paymentCount = null,
        public readonly ?BookingPaymentMethodsPaymentMethodProcessor $processor = null,
        public readonly ?string $processorType = null,
        public readonly ?string $reference = null,
        public readonly ?bool $restrictedToOrders = null,
        public readonly ?string $specifiedOrderIds = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
