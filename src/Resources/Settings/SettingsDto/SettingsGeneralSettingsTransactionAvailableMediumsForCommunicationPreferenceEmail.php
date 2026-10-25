<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** A `SettingsGeneralSettingsTransactionAvailableMediumsForCommunicationPreference`'s `email`. */
final class SettingsGeneralSettingsTransactionAvailableMediumsForCommunicationPreferenceEmail extends Dto
{
    public function __construct(
        public readonly ?string $default = null,
        public readonly ?string $enabled = null,
    ) {
    }
}
