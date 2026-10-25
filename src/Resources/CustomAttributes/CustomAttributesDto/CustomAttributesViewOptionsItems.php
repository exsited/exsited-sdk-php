<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomAttributes\CustomAttributesDto;

use Exsited\Sdk\Client\Dto;

/** The `items` object of CustomAttributesViewOptions. */
final class CustomAttributesViewOptionsItems extends Dto
{
    public function __construct(
        public readonly ?int $displayOrder = null,
        public readonly ?string $name = null,
    ) {
    }
}
