<?php

declare(strict_types=1);

namespace Exsited\Resources\TimePeriods\TimePeriodsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One page of `SettingsTimePeriod` records, under `data`. */
final class SettingsTimePeriodList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/time_periods',
    ];

    /** @param list<SettingsTimePeriod|null>|null $data */
    public function __construct(
        #[ListOf(SettingsTimePeriod::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
