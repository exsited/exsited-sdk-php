<?php

declare(strict_types=1);

namespace Exsited\Resources\Orders\OrdersDto;

use Exsited\Client\Dto;

/** The `pricing_rule` object of OrderLineItemPriceSnapshot. */
final class OrderLineItemPriceSnapshotPricingRule extends Dto
{
    public function __construct(
        public readonly ?float $price = null,
        public readonly ?string $pricePeriod = null,
        public readonly ?string $priceType = null,
        public readonly ?string $pricingLevel = null,
        public readonly ?string $pricingMethod = null,
        public readonly ?string $pricingSchedule = null,
        public readonly ?string $uom = null,
        public readonly ?string $uuid = null,
        public readonly ?string $version = null,
        public readonly ?string $warehouse = null,
    ) {
    }
}
