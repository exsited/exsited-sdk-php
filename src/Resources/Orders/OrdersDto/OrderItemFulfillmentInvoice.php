<?php

declare(strict_types=1);

namespace Exsited\Resources\Orders\OrdersDto;

use Exsited\Client\Dto;

/** A `OrderItemFulfillment`'s `invoice`. */
final class OrderItemFulfillmentInvoice extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $object = null,
    ) {
    }
}
