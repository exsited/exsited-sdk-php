<?php

declare(strict_types=1);

namespace Exsited\Resources\Orders\OrdersDto;

use Exsited\Client\Dto;

/** The `item_properties` object of OrderReadLine. */
final class OrderReadLineItemProperties extends Dto
{
    public function __construct(
        public readonly ?string $billingMode = null,
        public readonly ?string $chargingAndBillingAlignment = null,
        public readonly ?string $chargingPeriod = null,
        public readonly ?string $chargingStartDate = null,
        public readonly ?string $proRataPartialChargingPeriod = null,
        public readonly ?string $proRataPartialPricingPeriod = null,
    ) {
    }
}
