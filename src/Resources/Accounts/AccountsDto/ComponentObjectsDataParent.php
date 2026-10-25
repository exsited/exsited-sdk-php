<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Accounts\AccountsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of a `ComponentObjectsData`'s `parents`. */
final class ComponentObjectsDataParent extends Dto
{
    public function __construct(
        public readonly ?string $email = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $type = null,
    ) {
    }
}
