<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;

/** One entry of the `pricing_module` list of ItemReadPurchasePricing. */
final class ItemReadPurchasePricingPricingModule extends Dto
{
    public function __construct(
        public readonly ?string $currency = null,
        public readonly ?float $price = null,
        public readonly ?string $priceType = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $averagePurchasePrice = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastPurchasePrice = null,
        public readonly ?string $pricingLevel = null,
        public readonly ?string $unit = null,
    ) {
    }
}
