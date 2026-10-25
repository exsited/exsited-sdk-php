<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;

/** The `weight` object of ItemSaleReadSale. */
final class ItemSaleReadSaleWeight extends Dto
{
    public function __construct(
        public readonly ?string $uom = null,
        public readonly ?float $value = null,
    ) {
    }
}
