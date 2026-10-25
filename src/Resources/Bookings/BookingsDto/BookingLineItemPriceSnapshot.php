<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Bookings\BookingsDto;

use Exsited\Sdk\Client\Dto;

/** A `BookingLine`'s `item_price_snapshot`. */
final class BookingLineItemPriceSnapshot extends Dto
{
    public function __construct(
        public readonly ?BookingLineItemPriceSnapshotPricingRule $pricingRule = null,
    ) {
    }
}
