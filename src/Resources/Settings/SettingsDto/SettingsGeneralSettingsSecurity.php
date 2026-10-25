<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\WireName;

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
