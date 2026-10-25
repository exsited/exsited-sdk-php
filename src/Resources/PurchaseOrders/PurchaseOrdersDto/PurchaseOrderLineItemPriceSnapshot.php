<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Client\Dto;

/** The `item_price_snapshot` object of PurchaseOrderLine. */
final class PurchaseOrderLineItemPriceSnapshot extends Dto
{
    public function __construct(
        public readonly ?PurchaseOrderLineItemPriceSnapshotPricingRule $pricingRule = null,
    ) {
    }
}
