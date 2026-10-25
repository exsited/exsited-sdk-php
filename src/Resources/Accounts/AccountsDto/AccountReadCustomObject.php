<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** One entry of the `custom_objects` list of AccountRead. */
final class AccountReadCustomObject extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $code = null,
        public readonly ?float $rate = null,
    ) {
    }
}
