<?php

declare(strict_types=1);

namespace Exsited\Resources\UserSettings\UserSettingsDto;

use Exsited\Client\Dto;

/** The `display_settings` object of UserSettings. */
final class UserSettingsDisplaySettings extends Dto
{
    public function __construct(
        /** Its entries are untyped. */
        public readonly ?array $modules = null,
        public readonly ?bool $useDefault = null,
    ) {
    }
}
