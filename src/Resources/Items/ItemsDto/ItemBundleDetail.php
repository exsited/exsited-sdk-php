<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items\ItemsDto;

use Exsited\Sdk\Client\Dto;

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
