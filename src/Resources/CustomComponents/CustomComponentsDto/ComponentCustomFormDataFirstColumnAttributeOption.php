<?php

declare(strict_types=1);

namespace Exsited\Resources\CustomComponents\CustomComponentsDto;

use Exsited\Client\Dto;

/** One entry of the `options` list of ComponentCustomFormDataFirstColumnAttribute. */
final class ComponentCustomFormDataFirstColumnAttributeOption extends Dto
{
    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $name = null,
    ) {
    }
}
