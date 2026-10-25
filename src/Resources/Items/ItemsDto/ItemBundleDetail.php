<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;

/** One entry of the `bundle_details` list of Item. */
final class ItemBundleDetail extends Dto
{
    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?float $quantity = null,
        public readonly ?string $uom = null,
    ) {
    }
}
