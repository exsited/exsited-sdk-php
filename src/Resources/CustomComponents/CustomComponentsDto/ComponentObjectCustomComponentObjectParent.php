<?php

declare(strict_types=1);

namespace Exsited\Resources\CustomComponents\CustomComponentsDto;

use Exsited\Client\Dto;

/** One entry of a `ComponentObjectCustomComponentObject`'s `parents`. */
final class ComponentObjectCustomComponentObjectParent extends Dto
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
