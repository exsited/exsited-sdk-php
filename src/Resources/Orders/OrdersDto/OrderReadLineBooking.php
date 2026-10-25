<?php

declare(strict_types=1);

namespace Exsited\Resources\Orders\OrdersDto;

use Exsited\Client\Dto;

/** The `booking` object of OrderReadLine. */
final class OrderReadLineBooking extends Dto
{
    public function __construct(
        public readonly ?string $bookingEndTime = null,
        public readonly ?string $bookingStartTime = null,
        public readonly ?string $labourUuid = null,
    ) {
    }
}
