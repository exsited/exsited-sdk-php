<?php

declare(strict_types=1);

namespace Exsited\Resources\Bookings\BookingsDto;

use Exsited\Client\Dto;

/** A `BookingLine`'s `item_accounting_code`. */
final class BookingLineItemAccountingCode extends Dto
{
    public function __construct(
        public readonly ?string $salesRevenue = null,
    ) {
    }
}
