<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;

/** One entry of the `family_details` list of Item. */
final class ItemFamilyDetail extends Dto
{
    public function __construct(
        public readonly ?string $itemId = null,
        public readonly ?string $itemName = null,
    ) {
    }
}
