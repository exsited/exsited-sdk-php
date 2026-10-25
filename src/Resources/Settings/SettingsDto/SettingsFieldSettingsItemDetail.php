<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** The `general_settings` object of SettingsFieldSettingsItem. */
final class SettingsFieldSettingsItemDetail extends Dto
{
    public function __construct(
        public readonly ?SettingsFieldSettingsItemDetailAccount $account = null,
    ) {
    }
}
