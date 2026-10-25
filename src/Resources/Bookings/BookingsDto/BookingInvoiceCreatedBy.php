<?php

declare(strict_types=1);

namespace Exsited\Resources\Bookings\BookingsDto;

use Exsited\Client\Dto;

/** A `BookingInvoice`'s `created_by`. */
final class BookingInvoiceCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
