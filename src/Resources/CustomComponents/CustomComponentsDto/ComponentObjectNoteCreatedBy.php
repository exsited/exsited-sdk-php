<?php

declare(strict_types=1);

namespace Exsited\Resources\CustomComponents\CustomComponentsDto;

use Exsited\Client\Dto;

/** A `ComponentObjectNote`'s `created_by`. */
final class ComponentObjectNoteCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
