<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;

/** One entry of the `pricing_levels` list of ItemReadSale. */
final class ItemReadSalePricingLevel extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $uuid = null,
    ) {
    }
}
