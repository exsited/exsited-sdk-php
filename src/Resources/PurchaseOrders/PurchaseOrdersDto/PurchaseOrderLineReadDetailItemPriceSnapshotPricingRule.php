<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Sdk\Client\Dto;

/** The `pricing_rule` object of PurchaseOrderLineReadDetailItemPriceSnapshot. */
final class PurchaseOrderLineReadDetailItemPriceSnapshotPricingRule extends Dto
{
    public function __construct(
        public readonly ?float $price = null,
        public readonly ?string $priceType = null,
        public readonly ?string $pricingVersion = null,
        public readonly ?string $uom = null,
        public readonly ?string $uuid = null,
        public readonly ?string $version = null,
    ) {
    }
}
