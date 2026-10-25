<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Accounts\AccountsDto;

use Exsited\Sdk\Client\Dto;

/** The `email` object of AccountContactsContact. */
final class AccountContactsContactEmail extends Dto
{
    public function __construct(
        public readonly ?string $address = null,
        public readonly ?bool $emailOptedOut = null,
    ) {
    }
}
