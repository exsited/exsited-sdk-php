<?php

declare(strict_types=1);

namespace Exsited\Resources\Orders\OrdersDto;

use Exsited\Client\Dto;

/** The `item_sale_tax_configuration` object of OrderLine. */
final class OrderLineItemSaleTaxConfiguration extends Dto
{
    public function __construct(
        public readonly ?string $salePriceIsBasedOn = null,
        public readonly ?OrderLineItemSaleTaxConfigurationTaxCode $taxCode = null,
    ) {
    }
}
