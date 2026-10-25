<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Bookings\BookingsDto;

use Exsited\Sdk\Client\Dto;

/** A `BookingPaymentView`'s `created_by`. */
final class BookingPaymentViewCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
