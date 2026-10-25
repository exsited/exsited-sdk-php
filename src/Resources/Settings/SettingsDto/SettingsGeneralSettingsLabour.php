<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** A `SettingsGeneralSettings`'s `labour`. */
final class SettingsGeneralSettingsLabour extends Dto
{
    public function __construct(
        public readonly ?string $requireEmailAddressForLabour = null,
        public readonly ?string $uniqueEmailAddress = null,
        public readonly ?string $uniqueLabourName = null,
    ) {
    }
}
