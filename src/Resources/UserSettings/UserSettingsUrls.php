<?php

declare(strict_types=1);

namespace Exsited\Resources\UserSettings;

final class UserSettingsUrls
{
    public const USER_SETTINGS = '/api/{api_version}/user_settings/{user_id}';
    public const USER_SETTINGS_PROFILE_IMAGE = '/api/{api_version}/user_settings/{user_id}/profile_image';

    /** The envelope one `user_settings` record arrives under. */
    public const USER_SETTINGS_KEY = 'user_settings';
}
