<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Accounts\AccountsDto;

use Exsited\Sdk\Client\Dto;

/** The `name` object of AccountImageContact. */
final class AccountImageContactName extends Dto
{
    public function __construct(
        public readonly mixed $designation = null,
        public readonly ?string $first = null,
        public readonly mixed $last = null,
        public readonly mixed $middle = null,
        public readonly mixed $salutation = null,
    ) {
    }
}
