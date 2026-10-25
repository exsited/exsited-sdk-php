<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** A `SettingsFieldSettingsItemGeneralSettingsAccount`'s `account_grouping`. */
final class SettingsFieldSettingsItemGeneralSettingsAccountAccountGrouping extends Dto
{
    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $defaultGroup = null,
        public readonly ?string $enabled = null,
    ) {
    }
}
