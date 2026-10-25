<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Zones\ZonesDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One page of `SettingsZone` records, under `data`. */
final class SettingsZoneList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/zones',
    ];

    /** @param list<SettingsZone|null>|null $data */
    public function __construct(
        #[ListOf(SettingsZone::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
