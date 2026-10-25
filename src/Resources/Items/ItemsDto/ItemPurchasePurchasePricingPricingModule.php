<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items\ItemsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `pricing_module` list of ItemPurchasePurchasePricing. */
final class ItemPurchasePurchasePricingPricingModule extends Dto
{
    public function __construct(
        public readonly ?string $currency = null,
        public readonly ?float $price = null,
        public readonly ?string $priceType = null,
    ) {
    }
}
