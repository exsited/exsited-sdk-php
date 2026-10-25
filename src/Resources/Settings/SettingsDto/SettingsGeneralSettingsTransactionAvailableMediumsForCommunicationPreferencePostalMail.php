<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** A `SettingsGeneralSettingsTransactionAvailableMediumsForCommunicationPreference`'s
 *  `postal_mail`. */
final class SettingsGeneralSettingsTransactionAvailableMediumsForCommunicationPreferencePostalMail extends Dto
{
    public function __construct(
        public readonly ?string $default = null,
        public readonly ?string $enabled = null,
    ) {
    }
}
