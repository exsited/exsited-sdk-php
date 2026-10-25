<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\BillingPeriods\BillingPeriodsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One page of `SettingsBillingPeriod` records, under `data`. */
final class SettingsBillingPeriodList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/billing_periods',
    ];

    /** @param list<SettingsBillingPeriod|null>|null $data */
    public function __construct(
        #[ListOf(SettingsBillingPeriod::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
