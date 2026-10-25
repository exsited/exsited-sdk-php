<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Bookings\BookingsDto;

use Exsited\Sdk\Client\Dto;

/** A `BookingLine`'s `item_accounting_code`. */
final class BookingLineItemAccountingCode extends Dto
{
    public function __construct(
        public readonly ?string $salesRevenue = null,
    ) {
    }
}
