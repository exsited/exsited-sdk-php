<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;
use Exsited\Client\WireName;

/** A `SettingsGeneralSettings`'s `security`. */
final class SettingsGeneralSettingsSecurity extends Dto
{
    public function __construct(
        public readonly ?string $enableForceSessionExpire = null,
        public readonly ?string $enableTwoFactorAuthentication = null,
        #[WireName('implementerLogin')]
        public readonly ?string $implementerLogin = null,
        public readonly ?string $sessionExpireLimitHour = null,
    ) {
    }
}
