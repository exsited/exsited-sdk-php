<?php

declare(strict_types=1);

namespace Exsited\Resources\Bookings\BookingsDto;

use Exsited\Client\Dto;

/** A `BookingLine`'s `item_price_snapshot`. */
final class BookingLineItemPriceSnapshot extends Dto
{
    public function __construct(
        public readonly ?BookingLineItemPriceSnapshotPricingRule $pricingRule = null,
    ) {
    }
}
