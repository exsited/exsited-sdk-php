<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;

/** One entry of the `suppliers` list of ItemReadPurchase. */
final class ItemReadPurchaseSupplier extends Dto
{
    public function __construct(
        public readonly mixed $accountingCode = null,
        public readonly ?float $defaultPurchasePrice = null,
        public readonly mixed $id = null,
        public readonly ?string $name = null,
        public readonly ?ItemReadPurchaseSupplierPricing $pricing = null,
        public readonly mixed $purchaseOrderNote = null,
        public readonly ?ItemReadPurchaseSupplierTaxConfiguration $taxConfiguration = null,
        public readonly ?bool $taxExemptWhenPurchase = null,
    ) {
    }
}
