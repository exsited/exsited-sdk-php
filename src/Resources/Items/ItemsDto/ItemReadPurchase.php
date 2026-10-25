<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The `purchase` object of ItemRead. */
final class ItemReadPurchase extends Dto
{
    /** @param list<ItemReadPurchasePurchaseProperty|null>|null $purchaseProperties
     *  @param list<ItemReadPurchaseSupplier|null>|null $suppliers */
    public function __construct(
        public readonly mixed $accountingCode = null,
        public readonly ?float $defaultPurchasePrice = null,
        public readonly ?bool $enabled = null,
        public readonly ?ItemReadPurchasePricing $pricing = null,
        public readonly mixed $pricingProfile = null,
        public readonly ?string $purchaseOrderNote = null,
        #[ListOf(ItemReadPurchasePurchaseProperty::class)]
        public readonly ?array $purchaseProperties = null,
        public readonly ?bool $supplierManagementEnabled = null,
        #[ListOf(ItemReadPurchaseSupplier::class)]
        public readonly ?array $suppliers = null,
        public readonly ?ItemReadPurchaseTaxConfiguration $taxConfiguration = null,
        public readonly ?bool $taxExemptWhenPurchase = null,
    ) {
    }
}
