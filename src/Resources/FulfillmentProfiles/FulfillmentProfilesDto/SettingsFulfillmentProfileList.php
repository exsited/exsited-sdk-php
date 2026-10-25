<?php

declare(strict_types=1);

namespace Exsited\Resources\FulfillmentProfiles\FulfillmentProfilesDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One page of `SettingsFulfillmentProfile` records, under `data`. */
final class SettingsFulfillmentProfileList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/fulfillment_profiles',
    ];

    /** @param list<SettingsFulfillmentProfile|null>|null $data */
    public function __construct(
        #[ListOf(SettingsFulfillmentProfile::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
