<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** The SettingsGeneralSettingsItemUpdated body, as measured from the endpoints in MEASURED_FROM. */
final class SettingsGeneralSettingsItemUpdated extends Dto
{
    public const ENVELOPE_KEY = 'general_settings';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'PATCH /api/{api_version}/settings/general_settings/item',
    ];

    public function __construct(
        public readonly ?SettingsGeneralSettingsItemUpdatedItem $item = null,
        public readonly ?SettingsGeneralSettingsItemUpdatedProduct $product = null,
    ) {
    }
}
