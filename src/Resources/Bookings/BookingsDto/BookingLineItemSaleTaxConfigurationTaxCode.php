<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Bookings\BookingsDto;

use Exsited\Sdk\Client\Dto;

/** A `BookingLineItemSaleTaxConfiguration`'s `tax_code`. */
final class BookingLineItemSaleTaxConfigurationTaxCode extends Dto
{
    public function __construct(
        public readonly ?string $code = null,
        public readonly ?string $link = null,
        public readonly ?string $rate = null,
        public readonly ?string $uuid = null,
    ) {
    }
}
