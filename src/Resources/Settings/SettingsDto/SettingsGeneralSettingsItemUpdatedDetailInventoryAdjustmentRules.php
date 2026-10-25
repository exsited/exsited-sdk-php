<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** A `SettingsGeneralSettingsItemUpdatedDetail`'s `inventory_adjustment_rules`. */
final class SettingsGeneralSettingsItemUpdatedDetailInventoryAdjustmentRules extends Dto
{
    public function __construct(
        public readonly ?string $quantityAvailableForSale = null,
        public readonly ?string $quantityAvailableForSaleDetermination = null,
    ) {
    }
}
