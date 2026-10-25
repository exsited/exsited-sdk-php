<?php

declare(strict_types=1);

namespace Exsited\Resources\Express\ExpressDto;

use Exsited\Client\Dto;

/** The `item_price_snapshot` object of ExpressViewLine. */
final class ExpressViewLineItemPriceSnapshot extends Dto
{
    public function __construct(
        public readonly ?ExpressViewLineItemPriceSnapshotPricingRule $pricingRule = null,
    ) {
    }
}
