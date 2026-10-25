<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items\ItemsDto;

use Exsited\Sdk\Client\Dto;

/** The `weight` object of ItemReadSale. */
final class ItemReadSaleWeight extends Dto
{
    public function __construct(
        public readonly ?string $uom = null,
        public readonly ?float $value = null,
    ) {
    }
}
