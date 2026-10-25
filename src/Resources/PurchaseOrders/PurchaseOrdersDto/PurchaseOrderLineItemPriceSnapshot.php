<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Sdk\Client\Dto;

/** The `item_price_snapshot` object of PurchaseOrderLine. */
final class PurchaseOrderLineItemPriceSnapshot extends Dto
{
    public function __construct(
        public readonly ?PurchaseOrderLineItemPriceSnapshotPricingRule $pricingRule = null,
    ) {
    }
}
