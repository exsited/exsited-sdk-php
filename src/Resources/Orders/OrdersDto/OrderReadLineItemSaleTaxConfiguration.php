<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Orders\OrdersDto;

use Exsited\Sdk\Client\Dto;

/** The `item_sale_tax_configuration` object of OrderReadLine. */
final class OrderReadLineItemSaleTaxConfiguration extends Dto
{
    public function __construct(
        public readonly ?string $salePriceIsBasedOn = null,
        public readonly ?OrderReadLineItemSaleTaxConfigurationTaxCode $taxCode = null,
    ) {
    }
}
