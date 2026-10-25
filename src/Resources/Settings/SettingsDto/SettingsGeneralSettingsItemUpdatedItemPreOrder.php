<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** The `pre_order` object of SettingsGeneralSettingsItemUpdatedItem. */
final class SettingsGeneralSettingsItemUpdatedItemPreOrder extends Dto
{
    public function __construct(
        public readonly ?string $enabled = null,
        public readonly ?string $numberOfPeriod = null,
        public readonly ?string $period = null,
    ) {
    }
}
