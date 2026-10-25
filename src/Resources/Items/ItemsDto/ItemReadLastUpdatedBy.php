<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items\ItemsDto;

use Exsited\Sdk\Client\Dto;

/** The `last_updated_by` object of ItemRead. */
final class ItemReadLastUpdatedBy extends Dto
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
