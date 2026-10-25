<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;

/** The `length` object of ItemSaleReadSale. */
final class ItemSaleReadSaleLength extends Dto
{
    public function __construct(
        public readonly ?string $uom = null,
        public readonly ?float $value = null,
    ) {
    }
}
