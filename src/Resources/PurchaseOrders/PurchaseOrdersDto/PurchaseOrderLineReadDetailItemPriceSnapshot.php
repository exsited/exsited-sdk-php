<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Client\Dto;

/** The `item_price_snapshot` object of PurchaseOrderLineReadDetail. */
final class PurchaseOrderLineReadDetailItemPriceSnapshot extends Dto
{
    public function __construct(
        public readonly ?PurchaseOrderLineReadDetailItemPriceSnapshotPricingRule $pricingRule = null,
    ) {
    }
}
