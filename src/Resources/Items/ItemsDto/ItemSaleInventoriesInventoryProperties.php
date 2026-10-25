<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items\ItemsDto;

use Exsited\Sdk\Client\Dto;

/** The `inventory_properties` object of ItemSaleInventories. */
final class ItemSaleInventoriesInventoryProperties extends Dto
{
    public function __construct(
        public readonly mixed $defaultCostPerUnit = null,
        public readonly ?bool $enableBatchTracking = null,
        public readonly ?bool $enableInventoryCosting = null,
        public readonly ?bool $enableLowStockNotification = null,
        public readonly ?bool $enablePreorder = null,
        public readonly ?bool $enableReordering = null,
        public readonly ?bool $enableSerialization = null,
        public readonly ?string $lowStockThresholdBasedOn = null,
        public readonly ?string $quantityAvailableForSale = null,
        public readonly ?array $quantityAvailableForSaleDetermination = null,
        public readonly ?string $reorderingThresholdBasedOn = null,
        public readonly ?bool $useAtpValueAsQuantityAvailableForWebhook = null,
    ) {
    }
}
