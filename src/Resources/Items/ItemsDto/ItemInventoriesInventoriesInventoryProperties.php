<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items\ItemsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The `inventory_properties` object of ItemInventoriesInventories. */
final class ItemInventoriesInventoriesInventoryProperties extends Dto
{
    /** @param list<ItemInventoriesInventoriesInventoryPropertiesPreorderConfiguration|null>|null $preorderConfiguration */
    public function __construct(
        public readonly mixed $defaultCostPerUnit = null,
        public readonly ?bool $enableBatchTracking = null,
        public readonly ?bool $enableInventoryCosting = null,
        public readonly ?bool $enableLowStockNotification = null,
        public readonly ?bool $enablePreorder = null,
        public readonly ?bool $enableReordering = null,
        public readonly ?bool $enableSerialization = null,
        public readonly ?string $lowStockThresholdBasedOn = null,
        #[ListOf(ItemInventoriesInventoriesInventoryPropertiesPreorderConfiguration::class)]
        public readonly ?array $preorderConfiguration = null,
        public readonly ?string $preorderPeriod = null,
        public readonly ?string $quantityAvailableForSale = null,
        public readonly ?array $quantityAvailableForSaleDetermination = null,
        public readonly ?string $reorderingThresholdBasedOn = null,
        public readonly ?bool $useAtpValueAsQuantityAvailableForWebhook = null,
    ) {
    }
}
