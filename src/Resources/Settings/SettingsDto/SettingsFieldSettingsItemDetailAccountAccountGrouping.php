<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** The `account_grouping` object of SettingsFieldSettingsItemDetailAccount. */
final class SettingsFieldSettingsItemDetailAccountAccountGrouping extends Dto
{
    public function __construct(
        public readonly mixed $defaultGroup = null,
        public readonly ?string $enabled = null,
    ) {
    }
}
