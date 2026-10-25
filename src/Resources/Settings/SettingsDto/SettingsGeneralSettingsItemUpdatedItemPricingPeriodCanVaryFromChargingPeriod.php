<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** The `pricing_period_can_vary_from_charging_period` object of SettingsGeneralSettingsItemUpdatedItem. */
final class SettingsGeneralSettingsItemUpdatedItemPricingPeriodCanVaryFromChargingPeriod extends Dto
{
    public function __construct(
        public readonly mixed $defaultPricingPeriod = null,
        public readonly ?string $enabled = null,
    ) {
    }
}
