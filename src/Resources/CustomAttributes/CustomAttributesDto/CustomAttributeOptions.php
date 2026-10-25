<?php

declare(strict_types=1);

namespace Exsited\Resources\CustomAttributes\CustomAttributesDto;

use Exsited\Client\Dto;

/** The `options` object of CustomAttribute. */
final class CustomAttributeOptions extends Dto
{
    public function __construct(
        public readonly mixed $also = null,
        public readonly ?CustomAttributeOptionsItems $items = null,
        public readonly ?array $type = null,
    ) {
    }
}
