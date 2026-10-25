<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** The `phone` object of AccountContactContacts. */
final class AccountContactContactsPhone extends Dto
{
    public function __construct(
        public readonly ?string $areaCode = null,
        public readonly mixed $callOptedOut = null,
        public readonly ?string $dialingCode = null,
        public readonly ?string $formatted = null,
        public readonly ?string $number = null,
    ) {
    }
}
