<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomAttributes\CustomAttributesDto;

use Exsited\Sdk\Client\Dto;

/** The `options` object of CustomAttributesView. */
final class CustomAttributesViewOptions extends Dto
{
    public function __construct(
        public readonly mixed $also = null,
        public readonly ?CustomAttributesViewOptionsItems $items = null,
        public readonly ?array $type = null,
    ) {
    }
}
