<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items\ItemsDto;

use Exsited\Sdk\Client\Dto;

/** The `inventories` object of ItemSale. */
final class ItemSaleInventories extends Dto
{
    public function __construct(
        public readonly ?string $defaultWarehouse = null,
        public readonly ?bool $enableWarehouseManagement = null,
        public readonly ?bool $enabled = null,
        public readonly ?ItemSaleInventoriesInventoryProperties $inventoryProperties = null,
        public readonly ?array $warehouses = null,
    ) {
    }
}
