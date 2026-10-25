<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Client\Dto;

/** The `item_purchase_tax_configuration` object of PurchaseOrderLine. */
final class PurchaseOrderLineItemPurchaseTaxConfiguration extends Dto
{
    public function __construct(
        public readonly ?bool $purchasePriceIsTaxInclusive = null,
        public readonly ?PurchaseOrderLineItemPurchaseTaxConfigurationTaxCode $taxCode = null,
        public readonly ?bool $taxExemptWhenPurchase = null,
    ) {
    }
}
