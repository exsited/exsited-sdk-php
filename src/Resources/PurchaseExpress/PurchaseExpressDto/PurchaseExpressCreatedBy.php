<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseExpress\PurchaseExpressDto;

use Exsited\Sdk\Client\Dto;

/** A `PurchaseExpress`'s `created_by`. */
final class PurchaseExpressCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
