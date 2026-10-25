<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Bookings\BookingsDto;

use Exsited\Sdk\Client\Dto;

/** The `item_properties` object of BookingByIdLine. */
final class BookingByIdLineItemProperties extends Dto
{
    public function __construct(
        public readonly ?string $billingMode = null,
        public readonly ?string $chargingAndBillingAlignment = null,
        public readonly ?string $chargingStartDate = null,
        public readonly ?string $proRataPartialPricingPeriod = null,
    ) {
    }
}
