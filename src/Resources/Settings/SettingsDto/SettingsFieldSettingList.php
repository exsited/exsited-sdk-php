<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One page of `SettingsFieldSettingsItemData` records, under `data`; paged by cursor. */
final class SettingsFieldSettingList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/field_settings',
    ];

    /** @param list<SettingsFieldSettingsItemData|null>|null $data */
    public function __construct(
        #[ListOf(SettingsFieldSettingsItemData::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
