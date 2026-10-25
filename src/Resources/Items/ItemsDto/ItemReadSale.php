<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items\ItemsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The `sale` object of ItemRead. */
final class ItemReadSale extends Dto
{
    /** @param list<ItemReadSalePaymentProperty|null>|null $paymentProperties
     *  @param list<ItemReadSalePricingLevel|null>|null $pricingLevels */
    public function __construct(
        public readonly mixed $accountingCode = null,
        public readonly ?ItemReadSaleCharge $charge = null,
        public readonly ?float $defaultSalePrice = null,
        public readonly mixed $discountProfile = null,
        public readonly ?bool $enableBackOrder = null,
        public readonly ?bool $enabled = null,
        public readonly mixed $endDate = null,
        public readonly ?ItemReadSaleHeight $height = null,
        public readonly ?string $invoiceNote = null,
        public readonly ?ItemReadSaleLength $length = null,
        #[ListOf(ItemReadSalePaymentProperty::class)]
        public readonly ?array $paymentProperties = null,
        public readonly ?ItemReadSalePricing $pricing = null,
        #[ListOf(ItemReadSalePricingLevel::class)]
        public readonly ?array $pricingLevels = null,
        public readonly ?string $pricingMethod = null,
        public readonly mixed $pricingProfile = null,
        public readonly ?array $pricingSchedules = null,
        public readonly mixed $salePrice = null,
        public readonly ?string $salePriceVariant = null,
        public readonly mixed $shippingProfile = null,
        public readonly mixed $startDate = null,
        public readonly ?ItemReadSaleTaxConfiguration $taxConfiguration = null,
        public readonly ?bool $taxExemptWhenSold = null,
        public readonly ?bool $useOnSalePrice = null,
        public readonly ?ItemReadSaleWeight $weight = null,
        public readonly ?ItemReadSaleWidth $width = null,
    ) {
    }
}
