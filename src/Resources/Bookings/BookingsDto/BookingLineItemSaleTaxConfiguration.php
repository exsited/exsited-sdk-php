<?php

declare(strict_types=1);

namespace Exsited\Resources\Bookings\BookingsDto;

use Exsited\Client\Dto;

/** A `BookingLine`'s `item_sale_tax_configuration`. */
final class BookingLineItemSaleTaxConfiguration extends Dto
{
    public function __construct(
        public readonly ?string $salePriceIsBasedOn = null,
        public readonly ?BookingLineItemSaleTaxConfigurationTaxCode $taxCode = null,
    ) {
    }
}
