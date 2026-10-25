<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** A page of SettingsDiscountProfile records under `data`; an unreadable entry is null and keeps
 *  its place. */
final class SettingsDiscountProfileList extends Dto
{
    /** The endpoints this page view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/discount_profiles',
    ];

    /** @param list<SettingsDiscountProfile|null>|null $data */
    public function __construct(
        #[ListOf(SettingsDiscountProfile::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
