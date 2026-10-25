<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** The `additional_contact_2` object of SettingsFieldSettingsItemDetailAccount. */
final class SettingsFieldSettingsItemDetailAccountAdditionalContact2 extends Dto
{
    public function __construct(
        public readonly ?string $displayName = null,
        public readonly ?string $enabled = null,
        public readonly ?string $requireEmailAddressForAdditionalContact2 = null,
        public readonly ?string $type = null,
    ) {
    }
}
