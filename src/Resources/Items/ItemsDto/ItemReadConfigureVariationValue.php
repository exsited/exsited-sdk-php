<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;

/** One entry of the `values` list of ItemReadConfigureVariation. */
final class ItemReadConfigureVariationValue extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $uuid = null,
    ) {
    }
}
