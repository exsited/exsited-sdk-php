<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items\ItemsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The `inventories` object of ItemRead. */
final class ItemReadInventories extends Dto
{
    /** @param list<ItemReadInventoriesWarehouse|null>|null $warehouses */
    public function __construct(
        public readonly ?string $defaultWarehouse = null,
        public readonly ?bool $enableWarehouseManagement = null,
        public readonly ?bool $enabled = null,
        public readonly ?ItemReadInventoriesInventoryProperties $inventoryProperties = null,
        #[ListOf(ItemReadInventoriesWarehouse::class)]
        public readonly ?array $warehouses = null,
    ) {
    }
}
