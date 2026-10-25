<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One entry of the `configure_variations` list of Item. */
final class ItemConfigureVariation extends Dto
{
    /** @param list<ItemConfigureVariationValue|null>|null $values */
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        #[ListOf(ItemConfigureVariationValue::class)]
        public readonly ?array $values = null,
    ) {
    }
}
