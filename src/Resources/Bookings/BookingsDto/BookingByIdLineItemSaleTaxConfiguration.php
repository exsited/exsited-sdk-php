<?php

declare(strict_types=1);

namespace Exsited\Resources\Bookings\BookingsDto;

use Exsited\Client\Dto;

/** The `item_sale_tax_configuration` object of BookingByIdLine. */
final class BookingByIdLineItemSaleTaxConfiguration extends Dto
{
    public function __construct(
        public readonly ?string $salePriceIsBasedOn = null,
        public readonly ?BookingByIdLineItemSaleTaxConfigurationTaxCode $taxCode = null,
    ) {
    }
}
