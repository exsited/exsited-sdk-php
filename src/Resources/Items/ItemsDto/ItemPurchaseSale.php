<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items\ItemsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The `sale` object of ItemPurchase. */
final class ItemPurchaseSale extends Dto
{
    /** @param list<ItemPurchaseSalePaymentProperty|null>|null $paymentProperties */
    public function __construct(
        public readonly mixed $accountingCode = null,
        public readonly ?ItemPurchaseSaleCharge $charge = null,
        public readonly ?float $defaultSalePrice = null,
        public readonly mixed $discountProfile = null,
        public readonly ?bool $enableBackOrder = null,
        public readonly ?bool $enabled = null,
        public readonly mixed $endDate = null,
        public readonly mixed $invoiceNote = null,
        #[ListOf(ItemPurchaseSalePaymentProperty::class)]
        public readonly ?array $paymentProperties = null,
        public readonly ?ItemPurchaseSalePricing $pricing = null,
        public readonly ?array $pricingLevels = null,
        public readonly ?string $pricingMethod = null,
        public readonly mixed $pricingProfile = null,
        public readonly ?array $pricingSchedules = null,
        public readonly mixed $salePrice = null,
        public readonly ?string $salePriceVariant = null,
        public readonly mixed $shippingProfile = null,
        public readonly mixed $startDate = null,
        public readonly ?ItemPurchaseSaleTaxConfiguration $taxConfiguration = null,
        public readonly ?bool $taxExemptWhenSold = null,
        public readonly ?bool $useOnSalePrice = null,
    ) {
    }
}
