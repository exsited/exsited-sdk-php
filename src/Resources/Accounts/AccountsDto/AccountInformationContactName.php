<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** The `name` object of AccountInformationContact. */
final class AccountInformationContactName extends Dto
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
