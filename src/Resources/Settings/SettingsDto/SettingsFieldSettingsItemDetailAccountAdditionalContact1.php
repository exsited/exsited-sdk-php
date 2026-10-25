<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** The `additional_contact_1` object of SettingsFieldSettingsItemDetailAccount. */
final class SettingsFieldSettingsItemDetailAccountAdditionalContact1 extends Dto
{
    public function __construct(
        public readonly ?string $displayName = null,
        public readonly ?string $enabled = null,
        public readonly ?string $requireEmailAddressForAdditionalContact1 = null,
        public readonly ?string $type = null,
    ) {
    }
}
