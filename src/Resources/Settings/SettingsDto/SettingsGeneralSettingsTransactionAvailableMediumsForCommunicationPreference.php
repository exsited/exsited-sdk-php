<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** A `SettingsGeneralSettingsTransaction`'s `available_mediums_for_communication_preference`. */
final class SettingsGeneralSettingsTransactionAvailableMediumsForCommunicationPreference extends Dto
{
    public function __construct(
        public readonly ?SettingsGeneralSettingsTransactionAvailableMediumsForCommunicationPreferenceEmail $email = null,
        public readonly ?SettingsGeneralSettingsTransactionAvailableMediumsForCommunicationPreferencePostalMail $postalMail = null,
        public readonly ?SettingsGeneralSettingsTransactionAvailableMediumsForCommunicationPreferenceTextMessage $textMessage = null,
        public readonly ?SettingsGeneralSettingsTransactionAvailableMediumsForCommunicationPreferenceVoiceMail $voiceMail = null,
    ) {
    }
}
