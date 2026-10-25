<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The `pricing` object of ItemReadPurchase. */
final class ItemReadPurchasePricing extends Dto
{
    /** @param list<ItemReadPurchasePricingPricingModule|null>|null $pricingModule */
    public function __construct(
        public readonly ?int $latestUsedPricingVersion = null,
        #[ListOf(ItemReadPurchasePricingPricingModule::class)]
        public readonly ?array $pricingModule = null,
        public readonly ?string $type = null,
        public readonly ?int $version = null,
    ) {
    }
}
