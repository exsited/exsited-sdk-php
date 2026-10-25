<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The `charge` object of ItemSaleSale. */
final class ItemSaleSaleCharge extends Dto
{
    /** @param list<ItemSaleSaleChargeProperty|null>|null $properties */
    public function __construct(
        #[ListOf(ItemSaleSaleChargeProperty::class)]
        public readonly ?array $properties = null,
        public readonly ?string $type = null,
    ) {
    }
}
