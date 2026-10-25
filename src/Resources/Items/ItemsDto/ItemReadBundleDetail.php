<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;

/** One entry of the `bundle_details` list of ItemRead. */
final class ItemReadBundleDetail extends Dto
{
    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?float $quantity = null,
        public readonly mixed $uom = null,
    ) {
    }
}
