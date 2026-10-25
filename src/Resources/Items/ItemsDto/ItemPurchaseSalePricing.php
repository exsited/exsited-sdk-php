<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items\ItemsDto;

use Exsited\Sdk\Client\Dto;

/** The `pricing` object of ItemPurchaseSale. */
final class ItemPurchaseSalePricing extends Dto
{
    public function __construct(
        public readonly mixed $latestUsedPricingVersion = null,
        public readonly ?array $pricingModule = null,
        public readonly ?string $type = null,
        public readonly ?int $version = null,
    ) {
    }
}
