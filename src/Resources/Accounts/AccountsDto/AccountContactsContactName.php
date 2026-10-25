<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** The `name` object of AccountContactsContact. */
final class AccountContactsContactName extends Dto
{
    public function __construct(
        public readonly ?string $designation = null,
        public readonly ?string $first = null,
        public readonly ?string $last = null,
        public readonly ?string $middle = null,
        public readonly ?string $salutation = null,
    ) {
    }
}
