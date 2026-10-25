<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;

/** One entry of the `codes` list of ItemsView. */
final class ItemsViewCode extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly mixed $value = null,
    ) {
    }
}
