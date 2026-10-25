<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Teams\TeamsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One page of `SettingsTeam` records, under `data`. */
final class SettingsTeamList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/teams',
    ];

    /** @param list<SettingsTeam|null>|null $data */
    public function __construct(
        #[ListOf(SettingsTeam::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
