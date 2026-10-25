<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Express\ExpressDto;

use Exsited\Sdk\Client\Dto;

/** The `item_sale_tax_configuration` object of ExpressViewLine. */
final class ExpressViewLineItemSaleTaxConfiguration extends Dto
{
    public function __construct(
        public readonly ?string $salePriceIsBasedOn = null,
        public readonly ?ExpressViewLineItemSaleTaxConfigurationTaxCode $taxCode = null,
    ) {
    }
}
