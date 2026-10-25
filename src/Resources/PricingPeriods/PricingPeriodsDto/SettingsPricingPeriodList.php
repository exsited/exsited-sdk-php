<?php

declare(strict_types=1);

namespace Exsited\Resources\PricingPeriods\PricingPeriodsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One page of `SettingsPricingPeriod` records, under `data`. */
final class SettingsPricingPeriodList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/pricing_periods',
    ];

    /** @param list<SettingsPricingPeriod|null>|null $data */
    public function __construct(
        #[ListOf(SettingsPricingPeriod::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
