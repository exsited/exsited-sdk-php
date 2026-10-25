<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;

/** One entry of the `preorder_configuration` list of ItemInventoriesInventoriesInventoryProperties. */
final class ItemInventoriesInventoriesInventoryPropertiesPreorderConfiguration extends Dto
{
    public function __construct(
        public readonly ?string $endDate = null,
        public readonly ?string $name = null,
        public readonly ?string $startDate = null,
    ) {
    }
}
