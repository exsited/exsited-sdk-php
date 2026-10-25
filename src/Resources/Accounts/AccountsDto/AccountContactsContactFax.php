<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Accounts\AccountsDto;

use Exsited\Sdk\Client\Dto;

/** The `fax` object of AccountContactsContact. */
final class AccountContactsContactFax extends Dto
{
    public function __construct(
        public readonly ?string $areaCode = null,
        public readonly ?bool $callOptedOut = null,
        public readonly ?string $dialingCode = null,
        public readonly ?string $formatted = null,
        public readonly ?string $number = null,
    ) {
    }
}
