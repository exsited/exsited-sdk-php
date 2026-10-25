<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Bookings\BookingsDto;

use Exsited\Sdk\Client\Dto;

/** The `item_price_snapshot` object of BookingByIdLine. */
final class BookingByIdLineItemPriceSnapshot extends Dto
{
    public function __construct(
        public readonly ?BookingByIdLineItemPriceSnapshotPricingRule $pricingRule = null,
    ) {
    }
}
