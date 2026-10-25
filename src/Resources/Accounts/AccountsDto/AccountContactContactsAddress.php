<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** The `address` object of AccountContactContacts. */
final class AccountContactContactsAddress extends Dto
{
    public function __construct(
        public readonly ?string $city = null,
        public readonly ?string $country = null,
        public readonly mixed $countryCode = null,
        public readonly ?string $line1 = null,
        public readonly mixed $line2 = null,
        public readonly ?string $postalCode = null,
        public readonly ?string $state = null,
    ) {
    }
}
