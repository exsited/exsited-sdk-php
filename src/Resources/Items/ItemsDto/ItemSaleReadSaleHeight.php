<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;

/** The `height` object of ItemSaleReadSale. */
final class ItemSaleReadSaleHeight extends Dto
{
    public function __construct(
        public readonly ?string $uom = null,
        public readonly ?float $value = null,
    ) {
    }
}
