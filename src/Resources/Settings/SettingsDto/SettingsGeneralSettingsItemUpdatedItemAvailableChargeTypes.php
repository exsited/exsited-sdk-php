<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** The `available_charge_types` object of SettingsGeneralSettingsItemUpdatedItem. */
final class SettingsGeneralSettingsItemUpdatedItemAvailableChargeTypes extends Dto
{
    public function __construct(
        public readonly ?string $metered = null,
        public readonly ?string $oneOff = null,
        public readonly ?string $recurring = null,
    ) {
    }
}
