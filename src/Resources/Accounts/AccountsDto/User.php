<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** Whoever created or last updated a record. */
final class User extends Dto
{
    public function __construct(
        public readonly ?string $object = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $email = null,
        public readonly ?string $href = null,
    ) {
    }
}
