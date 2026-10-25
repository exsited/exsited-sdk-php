<?php

declare(strict_types=1);

namespace Exsited\Resources\Bookings\BookingsDto;

use Exsited\Client\Dto;

/** One entry of a `BookingNote`'s `watchers`. */
final class BookingNoteWatcher extends Dto
{
    public function __construct(
        public readonly ?string $email = null,
        public readonly ?string $name = null,
        public readonly ?string $type = null,
    ) {
    }
}
