<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** The `general_settings` object of SettingsFieldSettingsItem. */
final class SettingsFieldSettingsItemDetail extends Dto
{
    public function __construct(
        public readonly ?SettingsFieldSettingsItemDetailAccount $account = null,
    ) {
    }
}
