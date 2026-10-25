<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** The `email` object of AccountReadContact. */
final class AccountReadContactEmail extends Dto
{
    public function __construct(
        public readonly ?string $address = null,
        public readonly ?bool $emailOptedOut = null,
        public readonly ?bool $doNotEmail = null,
    ) {
    }
}
