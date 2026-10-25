<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** The `time_zone` object of Account. */
final class AccountTimeZone extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
