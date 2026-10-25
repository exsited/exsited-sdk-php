<?php

declare(strict_types=1);

namespace Exsited\Resources\Bookings\BookingsDto;

use Exsited\Client\Dto;

/** The `tax_code` object of BookingByIdLineItemSaleTaxConfiguration. */
final class BookingByIdLineItemSaleTaxConfigurationTaxCode extends Dto
{
    public function __construct(
        public readonly ?string $code = null,
        public readonly ?string $link = null,
        public readonly float|string|null $rate = null,
        public readonly ?string $uuid = null,
    ) {
    }
}
