<?php

declare(strict_types=1);

namespace Exsited\Resources\CommunicationProfiles\CommunicationProfilesDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One page of `SettingsCommunicationProfile` records, under `data`. */
final class SettingsCommunicationProfileList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/communication_profiles',
    ];

    /** @param list<SettingsCommunicationProfile|null>|null $data */
    public function __construct(
        #[ListOf(SettingsCommunicationProfile::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
