<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;

/** One entry of the `warehouses` list of ItemInventoriesInventories. */
final class ItemInventoriesInventoriesWarehouse extends Dto
{
    public function __construct(
        public readonly ?float $quantityAvailable = null,
        public readonly ?string $quantityAvailableValue = null,
        public readonly ?int $quantityOnHand = null,
        public readonly ?string $quantityOnHandValue = null,
        public readonly ?int $quantityOnOrder = null,
        public readonly ?int $quantityOnPurchaseReturn = null,
        public readonly ?int $quantityOnReturn = null,
        public readonly ?float $quantityPromised = null,
        public readonly ?string $uom = null,
        public readonly ?ItemInventoriesInventoriesWarehouseWarehouse $warehouse = null,
    ) {
    }
}
