<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;

/** A pointer to another record: `{object, id, name, href}`. */
final class Reference extends Dto
{
    public function __construct(
        public readonly ?string $object = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $href = null,
    ) {
    }
}
