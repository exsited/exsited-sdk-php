<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** A `SettingsFieldSettingsItemGeneralSettingsAccount`'s `referral_tracking_at_account_level`. */
final class SettingsFieldSettingsItemGeneralSettingsAccountReferralTrackingAtAccountLevel extends Dto
{
    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $defaultReferralTracking = null,
        public readonly ?string $enabled = null,
    ) {
    }
}
