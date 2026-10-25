<?php

declare(strict_types=1);

namespace Exsited\Resources\ChargingPeriods\ChargingPeriodsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One page of `SettingsChargingPeriod` records, under `data`. */
final class SettingsChargingPeriodList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/charging_periods',
    ];

    /** @param list<SettingsChargingPeriod|null>|null $data */
    public function __construct(
        #[ListOf(SettingsChargingPeriod::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
