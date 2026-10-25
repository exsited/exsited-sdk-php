<?php

declare(strict_types=1);

namespace Exsited\Resources\Usages\UsagesDto;

use Exsited\Client\Dto;

/** One entry of the `custom_attributes` list of Usage. */
final class UsageCustomAttribute extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $type = null,
        public readonly ?string $value = null,
    ) {
    }
}
