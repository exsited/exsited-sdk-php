<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items\ItemsDto;

use Exsited\Sdk\Client\Dto;

/** The `tax_configuration` object of ItemReadPurchaseSupplier. */
final class ItemReadPurchaseSupplierTaxConfiguration extends Dto
{
    public function __construct(
        public readonly ?bool $purchasePriceEnteredInclusiveOfTax = null,
        public readonly ?ItemReadPurchaseSupplierTaxConfigurationTaxCode $taxCode = null,
    ) {
    }
}
