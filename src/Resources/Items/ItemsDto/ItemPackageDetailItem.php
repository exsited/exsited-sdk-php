<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items\ItemsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `items` list of ItemPackageDetail. */
final class ItemPackageDetailItem extends Dto
{
    public function __construct(
        public readonly ?string $itemId = null,
        public readonly ?string $itemName = null,
        public readonly ?float $quantity = null,
        public readonly mixed $uom = null,
    ) {
    }
}
