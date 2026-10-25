<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** A `SettingsFieldSettingsItemGeneralSettingsAccount`'s `account_management`. */
final class SettingsFieldSettingsItemGeneralSettingsAccountAccountManagement extends Dto
{
    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $defaultManager = null,
        public readonly ?string $enabled = null,
    ) {
    }
}
