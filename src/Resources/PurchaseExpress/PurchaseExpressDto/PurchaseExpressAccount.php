<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseExpress\PurchaseExpressDto;

use Exsited\Sdk\Client\Dto;

/** A `PurchaseExpress`'s `account`. */
final class PurchaseExpressAccount extends Dto
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
