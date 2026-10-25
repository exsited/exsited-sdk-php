<?php

declare(strict_types=1);

namespace Exsited\Resources\CustomComponents\CustomComponentsDto;

use Exsited\Client\Dto;

/** The `typeActual` object of ComponentCustomFormDataSecondColumnAttribute. */
final class ComponentCustomFormDataSecondColumnAttributeTypeActual extends Dto
{
    public function __construct(
        public readonly ?string $key = null,
        public readonly ?string $value = null,
    ) {
    }
}
