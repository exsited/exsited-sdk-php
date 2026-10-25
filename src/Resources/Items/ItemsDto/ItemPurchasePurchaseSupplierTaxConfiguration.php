<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;

/** The `tax_configuration` object of ItemPurchasePurchaseSupplier. */
final class ItemPurchasePurchaseSupplierTaxConfiguration extends Dto
{
    public function __construct(
        public readonly ?bool $purchasePriceEnteredInclusiveOfTax = null,
        public readonly ?ItemPurchasePurchaseSupplierTaxConfigurationTaxCode $taxCode = null,
    ) {
    }
}
