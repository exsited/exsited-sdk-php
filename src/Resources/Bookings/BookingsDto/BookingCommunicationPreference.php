<?php

declare(strict_types=1);

namespace Exsited\Resources\Bookings\BookingsDto;

use Exsited\Client\Dto;

/** One entry of the `communication_preferences` list of Booking. */
final class BookingCommunicationPreference extends Dto
{
    public function __construct(
        public readonly ?string $channel = null,
        public readonly ?bool $enabled = null,
    ) {
    }
}
