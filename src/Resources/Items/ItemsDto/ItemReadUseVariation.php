<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items\ItemsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One entry of the `use_variations` list of ItemRead. */
final class ItemReadUseVariation extends Dto
{
    /** @param list<ItemReadUseVariationValue|null>|null $values */
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        #[ListOf(ItemReadUseVariationValue::class)]
        public readonly ?array $values = null,
    ) {
    }
}
