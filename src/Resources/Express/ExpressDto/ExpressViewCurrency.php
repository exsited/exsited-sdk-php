<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Express\ExpressDto;

use Exsited\Sdk\Client\Dto;

/** The `currency` object of ExpressView. */
final class ExpressViewCurrency extends Dto
{
    public function __construct(
        public readonly ?string $code = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
