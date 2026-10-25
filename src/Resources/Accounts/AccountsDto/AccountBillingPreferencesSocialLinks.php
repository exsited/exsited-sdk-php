<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** The `social_links` object of AccountBillingPreferences. */
final class AccountBillingPreferencesSocialLinks extends Dto
{
    public function __construct(
        public readonly mixed $facebook = null,
        public readonly mixed $linkedin = null,
        public readonly mixed $twitter = null,
        public readonly mixed $website = null,
    ) {
    }
}
