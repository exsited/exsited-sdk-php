<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** The `item_grouping` object of SettingsGeneralSettingsItemUpdatedItem. */
final class SettingsGeneralSettingsItemUpdatedItemItemGrouping extends Dto
{
    public function __construct(
        public readonly mixed $defaultGroup = null,
        public readonly ?string $enabled = null,
    ) {
    }
}
