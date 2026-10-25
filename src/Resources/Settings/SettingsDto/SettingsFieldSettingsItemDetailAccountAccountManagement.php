<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** The `account_management` object of SettingsFieldSettingsItemDetailAccount. */
final class SettingsFieldSettingsItemDetailAccountAccountManagement extends Dto
{
    public function __construct(
        public readonly mixed $defaultManager = null,
        public readonly ?string $enabled = null,
    ) {
    }
}
