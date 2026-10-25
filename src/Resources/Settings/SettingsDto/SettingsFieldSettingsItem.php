<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The SettingsFieldSettingsItem body, as measured from the endpoints in MEASURED_FROM. */
final class SettingsFieldSettingsItem extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'PATCH /api/{api_version}/settings/field_settings/account',
        'PATCH /api/{api_version}/settings/field_settings/item',
        'PATCH /api/{api_version}/settings/general_settings/account',
    ];

    /** @param list<SettingsFieldSettingsItemData|null>|null $data */
    public function __construct(
        #[ListOf(SettingsFieldSettingsItemData::class)]
        public readonly ?array $data = null,
        public readonly ?SettingsFieldSettingsItemDetail $generalSettings = null,
        public readonly ?string $message = null,
        public readonly ?string $object = null,
        public readonly mixed $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
