<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items\ItemsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The `pricing` object of ItemPurchasePurchase. */
final class ItemPurchasePurchasePricing extends Dto
{
    /** @param list<ItemPurchasePurchasePricingPricingModule|null>|null $pricingModule */
    public function __construct(
        public readonly ?int $latestUsedPricingVersion = null,
        #[ListOf(ItemPurchasePurchasePricingPricingModule::class)]
        public readonly ?array $pricingModule = null,
        public readonly ?string $type = null,
        public readonly ?int $version = null,
    ) {
    }
}
