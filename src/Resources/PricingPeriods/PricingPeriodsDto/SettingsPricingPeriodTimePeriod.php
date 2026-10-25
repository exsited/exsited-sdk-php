<?php

declare(strict_types=1);

namespace Exsited\Resources\PricingPeriods\PricingPeriodsDto;

use Exsited\Client\Dto;

/** A `SettingsPricingPeriod`'s `time_period`. */
final class SettingsPricingPeriodTimePeriod extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
