<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** The `referral_tracking_at_account_level` object of SettingsFieldSettingsItemDetailAccount. */
final class SettingsFieldSettingsItemDetailAccountReferralTrackingAtAccountLevel extends Dto
{
    public function __construct(
        public readonly mixed $defaultReferralTracking = null,
        public readonly ?string $enabled = null,
    ) {
    }
}
