<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items\ItemsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The `charge` object of ItemSaleReadSale. */
final class ItemSaleReadSaleCharge extends Dto
{
    /** @param list<ItemSaleReadSaleChargeProperty|null>|null $properties */
    public function __construct(
        public readonly ?string $pricePeriod = null,
        #[ListOf(ItemSaleReadSaleChargeProperty::class)]
        public readonly ?array $properties = null,
        public readonly ?string $type = null,
    ) {
    }
}
