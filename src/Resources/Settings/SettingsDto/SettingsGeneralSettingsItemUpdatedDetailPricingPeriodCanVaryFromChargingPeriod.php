<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** A `SettingsGeneralSettingsItemUpdatedDetail`'s `pricing_period_can_vary_from_charging_period`. */
final class SettingsGeneralSettingsItemUpdatedDetailPricingPeriodCanVaryFromChargingPeriod extends Dto
{
    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $defaultPricingPeriod = null,
        public readonly ?string $enabled = null,
    ) {
    }
}
