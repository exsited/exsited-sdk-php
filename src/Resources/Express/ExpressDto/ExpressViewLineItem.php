<?php

declare(strict_types=1);

namespace Exsited\Resources\Express\ExpressDto;

use Exsited\Client\Dto;

/** The `item` object of ExpressViewLine. */
final class ExpressViewLineItem extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $uuid = null,
    ) {
    }
}
