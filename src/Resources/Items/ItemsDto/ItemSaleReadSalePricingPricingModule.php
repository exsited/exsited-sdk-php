<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;

/** One entry of the `pricing_module` list of ItemSaleReadSalePricing. */
final class ItemSaleReadSalePricingPricingModule extends Dto
{
    public function __construct(
        public readonly mixed $averagePurchasePrice = null,
        public readonly ?string $currency = null,
        public readonly mixed $lastPurchasePrice = null,
        public readonly ?float $price = null,
        public readonly ?string $pricingLevel = null,
        public readonly ?string $unit = null,
    ) {
    }
}
