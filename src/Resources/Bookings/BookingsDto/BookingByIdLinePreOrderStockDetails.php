<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Bookings\BookingsDto;

use Exsited\Sdk\Client\Dto;

/** The `pre_order_stock_details` object of BookingByIdLine. */
final class BookingByIdLinePreOrderStockDetails extends Dto
{
    public function __construct(
        public readonly ?string $pendingReserve = null,
        public readonly ?string $reserved = null,
        public readonly ?string $sold = null,
    ) {
    }
}
