<?php

declare(strict_types=1);

namespace Exsited\Resources\UserSettings\UserSettingsDto;

use Exsited\Client\Dto;

/** The `profile` object of UserSettings. */
final class UserSettingsProfile extends Dto
{
    public function __construct(
        public readonly ?string $displayName = null,
        public readonly ?string $email = null,
        public readonly ?string $imageLink = null,
        public readonly ?string $name = null,
        /** Untyped. */
        public readonly mixed $timeZone = null,
    ) {
    }
}
