<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** A `SettingsFieldSettingsItemGeneralSettingsAccount`'s `account_grouping`. */
final class SettingsFieldSettingsItemGeneralSettingsAccountAccountGrouping extends Dto
{
    public function __construct(
        /** Untyped. */
        public readonly mixed $defaultGroup = null,
        public readonly ?string $enabled = null,
    ) {
    }
}
