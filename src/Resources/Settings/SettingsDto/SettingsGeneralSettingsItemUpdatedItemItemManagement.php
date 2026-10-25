<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** The `item_management` object of SettingsGeneralSettingsItemUpdatedItem. */
final class SettingsGeneralSettingsItemUpdatedItemItemManagement extends Dto
{
    public function __construct(
        public readonly mixed $defaultManager = null,
        public readonly ?string $enabled = null,
    ) {
    }
}
