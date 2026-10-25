<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomComponents\CustomComponentsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `options` list of ComponentCustomFormDataFirstColumnAttribute. */
final class ComponentCustomFormDataFirstColumnAttributeOption extends Dto
{
    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $name = null,
    ) {
    }
}
