<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** The `social_links` object of Account. */
final class AccountSocialLinks extends Dto
{
    public function __construct(
        public readonly ?string $facebook = null,
        public readonly ?string $linkedin = null,
        public readonly ?string $twitter = null,
        public readonly ?string $website = null,
    ) {
    }
}
