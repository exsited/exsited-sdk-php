<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items\ItemsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The `charge` object of ItemPurchaseSale. */
final class ItemPurchaseSaleCharge extends Dto
{
    /** @param list<ItemPurchaseSaleChargeProperty|null>|null $properties */
    public function __construct(
        #[ListOf(ItemPurchaseSaleChargeProperty::class)]
        public readonly ?array $properties = null,
        public readonly ?string $type = null,
    ) {
    }
}
