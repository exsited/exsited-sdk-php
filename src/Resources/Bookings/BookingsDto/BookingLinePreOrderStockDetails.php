<?php

declare(strict_types=1);

namespace Exsited\Resources\Bookings\BookingsDto;

use Exsited\Client\Dto;

/** A `BookingLine`'s `pre_order_stock_details`. */
final class BookingLinePreOrderStockDetails extends Dto
{
    public function __construct(
        public readonly ?string $pendingReserve = null,
        public readonly ?string $reserved = null,
        public readonly ?string $sold = null,
    ) {
    }
}
