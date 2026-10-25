<?php

declare(strict_types=1);

namespace Exsited\Resources\Bookings\BookingsDto;

use Exsited\Client\Dto;

/** The `item_price_snapshot` object of BookingByIdLine. */
final class BookingByIdLineItemPriceSnapshot extends Dto
{
    public function __construct(
        public readonly ?BookingByIdLineItemPriceSnapshotPricingRule $pricingRule = null,
    ) {
    }
}
