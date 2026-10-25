<?php

declare(strict_types=1);

namespace Exsited\Resources\CustomComponents\CustomComponentsDto;

use Exsited\Client\Dto;

/** A `ComponentObjectNote`'s `last_updated_by`, set once the note has been updated. */
final class ComponentObjectNoteLastUpdatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
