<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** The `use_volume_pricing` object of SettingsGeneralSettingsItemUpdatedItem. */
final class SettingsGeneralSettingsItemUpdatedItemUseVolumePricing extends Dto
{
    public function __construct(
        public readonly ?string $allUnitsFixedPricing = null,
        public readonly ?string $allUnitsPerUnitPricing = null,
        public readonly ?string $enabled = null,
        public readonly ?string $incrementalFixedPricing = null,
        public readonly ?string $incrementalPerUnitPricing = null,
    ) {
    }
}
