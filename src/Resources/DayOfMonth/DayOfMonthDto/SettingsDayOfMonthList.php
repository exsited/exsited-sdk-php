<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\DayOfMonth\DayOfMonthDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One page of `SettingsDayOfMonth` records, under `data`. */
final class SettingsDayOfMonthList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/day_of_month',
    ];

    /** @param list<SettingsDayOfMonth|null>|null $data */
    public function __construct(
        #[ListOf(SettingsDayOfMonth::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
