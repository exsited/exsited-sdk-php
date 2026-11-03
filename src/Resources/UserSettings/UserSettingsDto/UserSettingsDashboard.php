<?php

declare(strict_types=1);

namespace Exsited\Resources\UserSettings\UserSettingsDto;

use Exsited\Client\Dto;

/** The `dashboard` object of UserSettings. */
final class UserSettingsDashboard extends Dto
{
    public function __construct(
        /** Untyped. */
        public readonly mixed $defaultDashboard = null,
        /** Untyped. */
        public readonly mixed $enabledDashboards = null,
        public readonly ?bool $useDefault = null,
    ) {
    }
}
