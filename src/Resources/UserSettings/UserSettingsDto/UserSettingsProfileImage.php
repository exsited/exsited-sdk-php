<?php

declare(strict_types=1);

namespace Exsited\Resources\UserSettings\UserSettingsDto;

use Exsited\Client\Dto;
use Exsited\Client\WireName;

/** A user's profile image, under `user_settings`; `base64` is the image without a data URI
 *  prefix. */
final class UserSettingsProfileImage extends Dto
{
    public const ENVELOPE_KEY = 'user_settings';

    /** The endpoints this view covers. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/user_settings/{user_id}/profile_image',
    ];

    public function __construct(
        #[WireName('base64')]
        public readonly ?string $base64 = null,
    ) {
    }
}
