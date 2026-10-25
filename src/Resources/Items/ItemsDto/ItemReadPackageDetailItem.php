<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;

/** One entry of the `items` list of ItemReadPackageDetail. */
final class ItemReadPackageDetailItem extends Dto
{
    public function __construct(
        public readonly ?string $itemId = null,
        public readonly ?string $itemName = null,
        public readonly ?float $quantity = null,
        public readonly mixed $uom = null,
    ) {
    }
}
