<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The `charge` object of ItemReadSale. */
final class ItemReadSaleCharge extends Dto
{
    /** @param list<ItemReadSaleChargeProperty|null>|null $properties */
    public function __construct(
        public readonly ?string $pricePeriod = null,
        #[ListOf(ItemReadSaleChargeProperty::class)]
        public readonly ?array $properties = null,
        public readonly ?string $type = null,
    ) {
    }
}
