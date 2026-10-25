<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Accounts\AccountsDto;

use Exsited\Sdk\Client\Dto;

/** The `social_links` object of AccountImage. */
final class AccountImageSocialLinks extends Dto
{
    public function __construct(
        public readonly mixed $facebook = null,
        public readonly mixed $linkedin = null,
        public readonly mixed $twitter = null,
        public readonly mixed $website = null,
    ) {
    }
}
