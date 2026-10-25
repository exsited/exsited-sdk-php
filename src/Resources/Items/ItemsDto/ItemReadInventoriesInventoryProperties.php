<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items\ItemsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The `inventory_properties` object of ItemReadInventories. */
final class ItemReadInventoriesInventoryProperties extends Dto
{
    /** @param list<ItemReadInventoriesInventoryPropertiesPreorderConfiguration|null>|null $preorderConfiguration */
    public function __construct(
        public readonly mixed $defaultCostPerUnit = null,
        public readonly ?bool $enableBatchTracking = null,
        public readonly ?bool $enableInventoryCosting = null,
        public readonly ?bool $enableLowStockNotification = null,
        public readonly ?bool $enablePreorder = null,
        public readonly ?bool $enableReordering = null,
        public readonly ?bool $enableSerialization = null,
        public readonly ?string $lowStockThresholdBasedOn = null,
        #[ListOf(ItemReadInventoriesInventoryPropertiesPreorderConfiguration::class)]
        public readonly ?array $preorderConfiguration = null,
        public readonly ?string $preorderPeriod = null,
        public readonly ?string $quantityAvailableForSale = null,
        public readonly ?array $quantityAvailableForSaleDetermination = null,
        public readonly ?string $reorderingThresholdBasedOn = null,
        public readonly ?bool $useAtpValueAsQuantityAvailableForWebhook = null,
        public readonly ?bool $enabled = null,
    ) {
    }
}
