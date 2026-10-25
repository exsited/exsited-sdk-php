<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One entry of the `use_variations` list of Item. */
final class ItemUseVariation extends Dto
{
    /** @param list<ItemUseVariationValue|null>|null $values */
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        #[ListOf(ItemUseVariationValue::class)]
        public readonly ?array $values = null,
    ) {
    }
}
