<?php

declare(strict_types=1);

namespace Exsited\Resources\Orders\OrdersDto;

use Exsited\Client\Dto;

/** The `item_price_snapshot` object of OrderLine. */
final class OrderLineItemPriceSnapshot extends Dto
{
    public function __construct(
        public readonly ?OrderLineItemPriceSnapshotPricingRule $pricingRule = null,
    ) {
    }
}
