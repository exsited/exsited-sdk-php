<?php

declare(strict_types=1);

namespace Exsited\Resources\SalesReps\SalesRepsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One page of `SettingsSalesRep` records, under `data`. */
final class SettingsSalesRepList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/sales_reps',
    ];

    /** @param list<SettingsSalesRep|null>|null $data */
    public function __construct(
        #[ListOf(SettingsSalesRep::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
