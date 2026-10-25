<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items\ItemsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The `purchase` object of ItemPurchase. */
final class ItemPurchasePurchase extends Dto
{
    /** @param list<ItemPurchasePurchasePurchaseProperty|null>|null $purchaseProperties
     *  @param list<ItemPurchasePurchaseSupplier|null>|null $suppliers */
    public function __construct(
        public readonly mixed $accountingCode = null,
        public readonly ?float $defaultPurchasePrice = null,
        public readonly ?bool $enabled = null,
        public readonly ?ItemPurchasePurchasePricing $pricing = null,
        public readonly mixed $pricingProfile = null,
        public readonly ?string $purchaseOrderNote = null,
        #[ListOf(ItemPurchasePurchasePurchaseProperty::class)]
        public readonly ?array $purchaseProperties = null,
        public readonly ?bool $supplierManagementEnabled = null,
        #[ListOf(ItemPurchasePurchaseSupplier::class)]
        public readonly ?array $suppliers = null,
        public readonly ?ItemPurchasePurchaseTaxConfiguration $taxConfiguration = null,
        public readonly ?bool $taxExemptWhenPurchase = null,
    ) {
    }
}
