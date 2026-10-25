<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;

/** The `tax_configuration` object of ItemSaleReadSale. */
final class ItemSaleReadSaleTaxConfiguration extends Dto
{
    public function __construct(
        public readonly ?string $salePriceBasedOn = null,
        public readonly ?bool $salePriceEnteredInclusiveOfTax = null,
        public readonly ?ItemSaleReadSaleTaxConfigurationTaxCode $taxCode = null,
    ) {
    }
}
