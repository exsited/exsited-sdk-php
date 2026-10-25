<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** A `SettingsGeneralSettingsOrder`'s `referral_tracking_at_order_level`. */
final class SettingsGeneralSettingsOrderReferralTrackingAtOrderLevel extends Dto
{
    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $defaultReferralTracking = null,
        public readonly ?string $enabled = null,
    ) {
    }
}
