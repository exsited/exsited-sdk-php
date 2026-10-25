<?php

declare(strict_types=1);

namespace Exsited\Resources\Labours\LaboursDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** A page of LabourOrderListData records under `data`; an unreadable entry is null and keeps its place. */
final class LabourOrderList extends Dto
{
    /** The endpoints this page view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/labours/{labour_uuid}/orders',
    ];

    /** @param list<LabourOrderListData|null>|null $data */
    public function __construct(
        #[ListOf(LabourOrderListData::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
