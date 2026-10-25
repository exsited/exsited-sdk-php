<?php

declare(strict_types=1);

namespace Exsited\Resources\Orders\OrdersDto;

use Exsited\Client\Dto;

/** The `item` object of OrderLine. */
final class OrderLineItem extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $uuid = null,
    ) {
    }
}
