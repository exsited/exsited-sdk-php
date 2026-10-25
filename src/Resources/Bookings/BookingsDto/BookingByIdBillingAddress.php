<?php

declare(strict_types=1);

namespace Exsited\Resources\Bookings\BookingsDto;

use Exsited\Client\Dto;

/** The `billing_address` object of BookingById. */
final class BookingByIdBillingAddress extends Dto
{
    public function __construct(
        public readonly ?string $addressLine1 = null,
        public readonly ?string $addressLine2 = null,
        public readonly mixed $addressLine3 = null,
        public readonly mixed $addressLine4 = null,
        public readonly mixed $addressLine5 = null,
        public readonly ?string $city = null,
        public readonly ?string $country = null,
        public readonly ?string $name = null,
        public readonly ?string $postalCode = null,
        public readonly ?string $state = null,
    ) {
    }
}
