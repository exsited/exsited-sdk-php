<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One entry of the `use_variations` list of ItemInformation. */
final class ItemInformationUseVariation extends Dto
{
    /** @param list<ItemInformationUseVariationValue|null>|null $values */
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        #[ListOf(ItemInformationUseVariationValue::class)]
        public readonly ?array $values = null,
    ) {
    }
}
