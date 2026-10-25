<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items\ItemsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One entry of the `configure_variations` list of ItemRead. */
final class ItemReadConfigureVariation extends Dto
{
    /** @param list<ItemReadConfigureVariationValue|null>|null $values */
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        #[ListOf(ItemReadConfigureVariationValue::class)]
        public readonly ?array $values = null,
    ) {
    }
}
