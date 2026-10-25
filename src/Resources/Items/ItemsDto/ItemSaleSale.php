<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The `sale` object of ItemSale. */
final class ItemSaleSale extends Dto
{
    /** @param list<ItemSaleSalePaymentProperty|null>|null $paymentProperties */
    public function __construct(
        public readonly mixed $accountingCode = null,
        public readonly ?ItemSaleSaleCharge $charge = null,
        public readonly ?float $defaultSalePrice = null,
        public readonly mixed $discountProfile = null,
        public readonly ?bool $enableBackOrder = null,
        public readonly ?bool $enabled = null,
        public readonly mixed $endDate = null,
        public readonly mixed $invoiceNote = null,
        #[ListOf(ItemSaleSalePaymentProperty::class)]
        public readonly ?array $paymentProperties = null,
        public readonly ?ItemSaleSalePricing $pricing = null,
        public readonly ?array $pricingLevels = null,
        public readonly ?string $pricingMethod = null,
        public readonly mixed $pricingProfile = null,
        public readonly ?array $pricingSchedules = null,
        public readonly mixed $salePrice = null,
        public readonly ?string $salePriceVariant = null,
        public readonly mixed $shippingProfile = null,
        public readonly mixed $startDate = null,
        public readonly ?ItemSaleSaleTaxConfiguration $taxConfiguration = null,
        public readonly ?bool $taxExemptWhenSold = null,
        public readonly ?bool $useOnSalePrice = null,
    ) {
    }
}
