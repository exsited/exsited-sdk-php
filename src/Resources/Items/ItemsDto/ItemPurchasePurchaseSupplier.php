<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items\ItemsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `suppliers` list of ItemPurchasePurchase. */
final class ItemPurchasePurchaseSupplier extends Dto
{
    public function __construct(
        public readonly mixed $accountingCode = null,
        public readonly ?float $defaultPurchasePrice = null,
        public readonly mixed $id = null,
        public readonly ?string $name = null,
        public readonly ?ItemPurchasePurchaseSupplierPricing $pricing = null,
        public readonly mixed $purchaseOrderNote = null,
        public readonly ?ItemPurchasePurchaseSupplierTaxConfiguration $taxConfiguration = null,
        public readonly ?bool $taxExemptWhenPurchase = null,
    ) {
    }
}
