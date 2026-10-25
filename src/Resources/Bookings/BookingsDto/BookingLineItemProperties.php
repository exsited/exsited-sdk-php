<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Bookings\BookingsDto;

use Exsited\Sdk\Client\Dto;

/** A `BookingLine`'s `item_properties`. */
final class BookingLineItemProperties extends Dto
{
    public function __construct(
        public readonly ?string $billingMode = null,
        public readonly ?string $chargingAndBillingAlignment = null,
        public readonly ?string $chargingStartDate = null,
        public readonly ?string $proRataPartialPricingPeriod = null,
    ) {
    }
}
