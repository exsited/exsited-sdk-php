<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** A `SettingsGeneralSettingsItemUpdatedDetail`'s `use_volume_pricing`. */
final class SettingsGeneralSettingsItemUpdatedDetailUseVolumePricing extends Dto
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
