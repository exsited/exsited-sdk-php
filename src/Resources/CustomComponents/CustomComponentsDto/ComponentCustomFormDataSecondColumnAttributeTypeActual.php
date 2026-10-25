<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomComponents\CustomComponentsDto;

use Exsited\Sdk\Client\Dto;

/** The `typeActual` object of ComponentCustomFormDataSecondColumnAttribute. */
final class ComponentCustomFormDataSecondColumnAttributeTypeActual extends Dto
{
    public function __construct(
        public readonly ?string $key = null,
        public readonly ?string $value = null,
    ) {
    }
}
