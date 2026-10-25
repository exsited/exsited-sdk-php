<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** The `email` object of AccountContactContacts. */
final class AccountContactContactsEmail extends Dto
{
    public function __construct(
        public readonly ?string $address = null,
        public readonly mixed $emailOptedOut = null,
    ) {
    }
}
