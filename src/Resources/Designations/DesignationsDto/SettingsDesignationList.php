<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Designations\DesignationsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One page of `SettingsDesignation` records, under `data`. */
final class SettingsDesignationList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/designations',
    ];

    /** @param list<SettingsDesignation|null>|null $data */
    public function __construct(
        #[ListOf(SettingsDesignation::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
