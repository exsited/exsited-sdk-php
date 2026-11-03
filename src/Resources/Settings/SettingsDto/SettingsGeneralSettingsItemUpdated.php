<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** The SettingsGeneralSettingsItemUpdated body for the endpoints in MEASURED_FROM. */
final class SettingsGeneralSettingsItemUpdated extends Dto
{
    public const ENVELOPE_KEY = 'general_settings';

    /** The endpoints this view covers. */
    public const MEASURED_FROM = [
        'PATCH /api/{api_version}/settings/general_settings/item',
    ];

    public function __construct(
        public readonly ?SettingsGeneralSettingsItemUpdatedItem $item = null,
        public readonly ?SettingsGeneralSettingsItemUpdatedProduct $product = null,
    ) {
    }
}
