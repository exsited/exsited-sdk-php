<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomComponents\CustomComponentsDto;

use Exsited\Sdk\Client\Dto;

/** A `ComponentObjectCustomComponentObject`'s `custom_form`. */
final class ComponentObjectCustomComponentObjectCustomForm extends Dto
{
    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
