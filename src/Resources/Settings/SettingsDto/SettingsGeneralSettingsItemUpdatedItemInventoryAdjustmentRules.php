<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** The `inventory_adjustment_rules` object of SettingsGeneralSettingsItemUpdatedItem. */
final class SettingsGeneralSettingsItemUpdatedItemInventoryAdjustmentRules extends Dto
{
    public function __construct(
        public readonly ?string $quantityAvailableForSale = null,
        public readonly ?string $quantityAvailableForSaleDetermination = null,
    ) {
    }
}
