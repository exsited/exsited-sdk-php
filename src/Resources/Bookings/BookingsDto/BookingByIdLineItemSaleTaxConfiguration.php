<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Bookings\BookingsDto;

use Exsited\Sdk\Client\Dto;

/** The `item_sale_tax_configuration` object of BookingByIdLine. */
final class BookingByIdLineItemSaleTaxConfiguration extends Dto
{
    public function __construct(
        public readonly ?string $salePriceIsBasedOn = null,
        public readonly ?BookingByIdLineItemSaleTaxConfigurationTaxCode $taxCode = null,
    ) {
    }
}
