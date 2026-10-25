<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseExpress\PurchaseExpressDto;

use Exsited\Client\Dto;

/** A `PurchaseExpress`'s `created_by`. */
final class PurchaseExpressCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
