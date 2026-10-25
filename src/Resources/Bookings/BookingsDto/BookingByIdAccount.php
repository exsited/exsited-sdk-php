<?php

declare(strict_types=1);

namespace Exsited\Resources\Bookings\BookingsDto;

use Exsited\Client\Dto;

/** The `account` object of BookingById. */
final class BookingByIdAccount extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
