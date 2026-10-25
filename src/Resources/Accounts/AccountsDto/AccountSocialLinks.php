<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Accounts\AccountsDto;

use Exsited\Sdk\Client\Dto;

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
