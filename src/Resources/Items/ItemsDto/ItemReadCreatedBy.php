<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;

/** The `created_by` object of ItemRead. */
final class ItemReadCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $id = null,
        public readonly ?string $email = null,
        public readonly ?string $href = null,
    ) {
    }
}
