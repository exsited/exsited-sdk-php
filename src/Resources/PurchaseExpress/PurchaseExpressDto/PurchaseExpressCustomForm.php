<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseExpress\PurchaseExpressDto;

use Exsited\Sdk\Client\Dto;

/** A `PurchaseExpress`'s `custom_form`. */
final class PurchaseExpressCustomForm extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
