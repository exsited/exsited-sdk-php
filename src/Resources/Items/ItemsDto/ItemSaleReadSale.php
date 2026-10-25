<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The `sale` object of ItemSaleRead. */
final class ItemSaleReadSale extends Dto
{
    /** @param list<ItemSaleReadSalePaymentProperty|null>|null $paymentProperties
     *  @param list<ItemSaleReadSalePricingLevel|null>|null $pricingLevels */
    public function __construct(
        public readonly mixed $accountingCode = null,
        public readonly ?ItemSaleReadSaleCharge $charge = null,
        public readonly ?float $defaultSalePrice = null,
        public readonly mixed $discountProfile = null,
        public readonly ?bool $enableBackOrder = null,
        public readonly ?bool $enabled = null,
        public readonly mixed $endDate = null,
        public readonly ?ItemSaleReadSaleHeight $height = null,
        public readonly ?string $invoiceNote = null,
        public readonly ?ItemSaleReadSaleLength $length = null,
        #[ListOf(ItemSaleReadSalePaymentProperty::class)]
        public readonly ?array $paymentProperties = null,
        public readonly ?ItemSaleReadSalePricing $pricing = null,
        #[ListOf(ItemSaleReadSalePricingLevel::class)]
        public readonly ?array $pricingLevels = null,
        public readonly ?string $pricingMethod = null,
        public readonly mixed $pricingProfile = null,
        public readonly ?array $pricingSchedules = null,
        public readonly mixed $salePrice = null,
        public readonly ?string $salePriceVariant = null,
        public readonly mixed $shippingProfile = null,
        public readonly mixed $startDate = null,
        public readonly ?ItemSaleReadSaleTaxConfiguration $taxConfiguration = null,
        public readonly ?bool $taxExemptWhenSold = null,
        public readonly ?bool $useOnSalePrice = null,
        public readonly ?ItemSaleReadSaleWeight $weight = null,
        public readonly ?ItemSaleReadSaleWidth $width = null,
    ) {
    }
}
