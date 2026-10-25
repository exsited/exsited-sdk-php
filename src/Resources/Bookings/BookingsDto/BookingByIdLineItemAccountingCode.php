<?php

declare(strict_types=1);

namespace Exsited\Resources\Bookings\BookingsDto;

use Exsited\Client\Dto;

/** The `item_accounting_code` object of BookingByIdLine. */
final class BookingByIdLineItemAccountingCode extends Dto
{
    public function __construct(
        public readonly mixed $salesRevenue = null,
    ) {
    }
}
