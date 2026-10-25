<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** A `SettingsGeneralSettingsItemUpdatedDetail`'s `item_grouping`. */
final class SettingsGeneralSettingsItemUpdatedDetailItemGrouping extends Dto
{
    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $defaultGroup = null,
        public readonly ?string $enabled = null,
    ) {
    }
}
