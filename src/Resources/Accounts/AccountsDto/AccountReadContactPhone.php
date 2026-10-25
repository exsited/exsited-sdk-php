<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** The `phone` object of AccountReadContact. */
final class AccountReadContactPhone extends Dto
{
    public function __construct(
        public readonly ?string $areaCode = null,
        public readonly ?bool $callOptedOut = null,
        public readonly ?string $dialingCode = null,
        public readonly ?string $formatted = null,
        public readonly ?string $number = null,
        public readonly ?string $countryCode = null,
        public readonly ?bool $doNotCall = null,
    ) {
    }
}
