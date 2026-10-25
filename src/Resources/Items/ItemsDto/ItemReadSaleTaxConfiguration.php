<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items\ItemsDto;

use Exsited\Sdk\Client\Dto;

/** The `tax_configuration` object of ItemReadSale. */
final class ItemReadSaleTaxConfiguration extends Dto
{
    public function __construct(
        public readonly ?string $salePriceBasedOn = null,
        public readonly ?bool $salePriceEnteredInclusiveOfTax = null,
        public readonly ?ItemReadSaleTaxConfigurationTaxCode $taxCode = null,
        public readonly ?bool $purchasePriceEnteredInclusiveOfTax = null,
    ) {
    }
}
