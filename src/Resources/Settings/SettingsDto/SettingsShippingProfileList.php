<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** A page of SettingsShippingProfile records under `data`; an unreadable entry is null and keeps
 *  its place. */
final class SettingsShippingProfileList extends Dto
{
    /** The endpoints this page view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/shipping_profiles',
    ];

    /** @param list<SettingsShippingProfile|null>|null $data */
    public function __construct(
        #[ListOf(SettingsShippingProfile::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
