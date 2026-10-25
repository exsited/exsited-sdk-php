<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Bookings\BookingsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of a `BookingPaymentView`'s `payment_applied`. */
final class BookingPaymentViewPaymentApplied extends Dto
{
    public function __construct(
        public readonly ?string $amount = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $gatewayResponse = null,
        public readonly ?string $method = null,
        public readonly ?string $processor = null,
        public readonly ?string $reference = null,
    ) {
    }
}
