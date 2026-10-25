<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** One entry of the `custom_attributes` list of AccountContactsContact. */
final class AccountContactsContactCustomAttribute extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly mixed $value = null,
    ) {
    }
}
