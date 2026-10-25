<?php

declare(strict_types=1);

namespace Exsited\Resources\Applications\ApplicationsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One page of `SettingsApplication` records, under `data`. */
final class SettingsApplicationList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/applications',
    ];

    /** @param list<SettingsApplication|null>|null $data */
    public function __construct(
        #[ListOf(SettingsApplication::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
