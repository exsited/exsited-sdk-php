<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The `pricing` object of ItemSaleReadSale. */
final class ItemSaleReadSalePricing extends Dto
{
    /** @param list<ItemSaleReadSalePricingPricingModule|null>|null $pricingModule */
    public function __construct(
        public readonly ?int $latestUsedPricingVersion = null,
        #[ListOf(ItemSaleReadSalePricingPricingModule::class)]
        public readonly ?array $pricingModule = null,
        public readonly ?string $type = null,
        public readonly ?int $version = null,
    ) {
    }
}
