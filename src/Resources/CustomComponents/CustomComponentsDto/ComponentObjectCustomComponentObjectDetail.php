<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomComponents\CustomComponentsDto;

use Exsited\Sdk\Client\Dto;

/** A `ComponentObjectCustomComponentObject`'s `component`. */
final class ComponentObjectCustomComponentObjectDetail extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
