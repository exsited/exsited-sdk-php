<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Accounts\AccountsDto;

use Exsited\Sdk\Client\Dto;

/** The `name` object of AccountReadContact. */
final class AccountReadContactName extends Dto
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
