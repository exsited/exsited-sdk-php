<?php

declare(strict_types=1);

namespace Exsited\Resources\Uom\UomDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One page of `SettingsUom` records, under `data`. */
final class SettingsUomList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/uom',
    ];

    /** @param list<SettingsUom|null>|null $data */
    public function __construct(
        #[ListOf(SettingsUom::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
