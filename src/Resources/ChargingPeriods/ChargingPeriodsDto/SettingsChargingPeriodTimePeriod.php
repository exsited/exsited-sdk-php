<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ChargingPeriods\ChargingPeriodsDto;

use Exsited\Sdk\Client\Dto;

/** A `SettingsChargingPeriod`'s `time_period`. */
final class SettingsChargingPeriodTimePeriod extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
