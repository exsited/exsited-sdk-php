<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** A `SettingsGeneralSettingsItemUpdatedDetail`'s `available_charge_types`. */
final class SettingsGeneralSettingsItemUpdatedDetailAvailableChargeTypes extends Dto
{
    public function __construct(
        public readonly ?string $metered = null,
        public readonly ?string $oneOff = null,
        public readonly ?string $recurring = null,
    ) {
    }
}
