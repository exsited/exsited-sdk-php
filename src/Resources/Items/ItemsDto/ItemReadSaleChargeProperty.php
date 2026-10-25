<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;

/** One entry of the `properties` list of ItemReadSaleCharge. */
final class ItemReadSaleChargeProperty extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $value = null,
    ) {
    }
}
