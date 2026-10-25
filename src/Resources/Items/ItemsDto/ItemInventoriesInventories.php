<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items\ItemsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The `inventories` object of ItemInventories. */
final class ItemInventoriesInventories extends Dto
{
    /** @param list<ItemInventoriesInventoriesWarehouse|null>|null $warehouses */
    public function __construct(
        public readonly ?string $defaultWarehouse = null,
        public readonly ?bool $enableWarehouseManagement = null,
        public readonly ?bool $enabled = null,
        public readonly ?ItemInventoriesInventoriesInventoryProperties $inventoryProperties = null,
        #[ListOf(ItemInventoriesInventoriesWarehouse::class)]
        public readonly ?array $warehouses = null,
    ) {
    }
}
