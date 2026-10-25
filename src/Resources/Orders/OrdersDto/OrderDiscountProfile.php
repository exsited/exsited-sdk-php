<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Orders\OrdersDto;

use Exsited\Sdk\Client\Dto;

/** The `discount_profile` object of Order. */
final class OrderDiscountProfile extends Dto
{
    public function __construct(
        public readonly ?string $amount = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $redemptionCode = null,
        public readonly ?string $type = null,
    ) {
    }
}
