<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;

/** One entry of the `warehouses` list of ItemReadInventories. */
final class ItemReadInventoriesWarehouse extends Dto
{
    public function __construct(
        public readonly ?int $quantityAvailable = null,
        public readonly ?string $quantityAvailableValue = null,
        public readonly ?int $quantityOnHand = null,
        public readonly ?string $quantityOnHandValue = null,
        public readonly ?int $quantityOnOrder = null,
        public readonly ?int $quantityOnPurchaseReturn = null,
        public readonly ?int $quantityOnReturn = null,
        public readonly ?int $quantityPromised = null,
        public readonly mixed $uom = null,
        public readonly ?ItemReadInventoriesWarehouseWarehouse $warehouse = null,
    ) {
    }
}
