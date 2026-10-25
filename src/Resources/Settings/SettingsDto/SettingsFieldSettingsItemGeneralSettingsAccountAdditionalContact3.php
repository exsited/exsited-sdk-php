<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** A `SettingsFieldSettingsItemGeneralSettingsAccount`'s `additional_contact_3`. */
final class SettingsFieldSettingsItemGeneralSettingsAccountAdditionalContact3 extends Dto
{
    public function __construct(
        public readonly ?string $displayName = null,
        public readonly ?string $enabled = null,
        public readonly ?string $requireEmailAddressForAdditionalContact3 = null,
        public readonly ?string $type = null,
    ) {
    }
}
