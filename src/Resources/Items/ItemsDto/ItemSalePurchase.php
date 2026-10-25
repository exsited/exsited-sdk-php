<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The `purchase` object of ItemSale. */
final class ItemSalePurchase extends Dto
{
    /** @param list<ItemSalePurchasePurchaseProperty|null>|null $purchaseProperties */
    public function __construct(
        public readonly mixed $accountingCode = null,
        public readonly ?float $defaultPurchasePrice = null,
        public readonly ?bool $enabled = null,
        public readonly ?ItemSalePurchasePricing $pricing = null,
        public readonly mixed $pricingProfile = null,
        public readonly mixed $purchaseOrderNote = null,
        #[ListOf(ItemSalePurchasePurchaseProperty::class)]
        public readonly ?array $purchaseProperties = null,
        public readonly ?bool $supplierManagementEnabled = null,
        public readonly ?ItemSalePurchaseTaxConfiguration $taxConfiguration = null,
        public readonly ?bool $taxExemptWhenPurchase = null,
    ) {
    }
}
