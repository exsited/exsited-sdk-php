<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** A `SettingsGeneralSettingsOrder`'s `order_management`. */
final class SettingsGeneralSettingsOrderOrderManagement extends Dto
{
    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $defaultManager = null,
        public readonly ?string $enabled = null,
    ) {
    }
}
