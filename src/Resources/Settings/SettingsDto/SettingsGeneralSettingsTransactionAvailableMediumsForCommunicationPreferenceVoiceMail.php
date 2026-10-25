<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** A `SettingsGeneralSettingsTransactionAvailableMediumsForCommunicationPreference`'s
 *  `voice_mail`. */
final class SettingsGeneralSettingsTransactionAvailableMediumsForCommunicationPreferenceVoiceMail extends Dto
{
    public function __construct(
        public readonly ?string $default = null,
        public readonly ?string $enabled = null,
    ) {
    }
}
