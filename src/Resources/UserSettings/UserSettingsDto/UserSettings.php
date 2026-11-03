<?php

declare(strict_types=1);

namespace Exsited\Resources\UserSettings\UserSettingsDto;

use Exsited\Client\Dto;

/** One user's settings, under `user_settings`. */
final class UserSettings extends Dto
{
    public const ENVELOPE_KEY = 'user_settings';

    /** The endpoints this view covers. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/user_settings/{user_id}',
    ];

    public function __construct(
        /** Untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?UserSettingsDashboard $dashboard = null,
        public readonly ?UserSettingsDisplaySettings $displaySettings = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        /** Untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?UserSettingsProfile $profile = null,
    ) {
    }
}
