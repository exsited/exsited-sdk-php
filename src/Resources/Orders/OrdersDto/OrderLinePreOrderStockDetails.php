<?php

declare(strict_types=1);

namespace Exsited\Resources\Orders\OrdersDto;

use Exsited\Client\Dto;

/** The `pre_order_stock_details` object of OrderLine. */
final class OrderLinePreOrderStockDetails extends Dto
{
    public function __construct(
        public readonly ?string $pendingReserve = null,
        public readonly ?string $reserved = null,
        public readonly ?string $sold = null,
    ) {
    }
}
