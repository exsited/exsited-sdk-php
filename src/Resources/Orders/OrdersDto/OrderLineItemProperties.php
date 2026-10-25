<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Orders\OrdersDto;

use Exsited\Sdk\Client\Dto;

/** The `item_properties` object of OrderLine. */
final class OrderLineItemProperties extends Dto
{
    public function __construct(
        public readonly ?string $chargingAndBillingAlignment = null,
        public readonly ?string $chargingStartDate = null,
        public readonly ?string $proRataPartialPricingPeriod = null,
    ) {
    }
}
