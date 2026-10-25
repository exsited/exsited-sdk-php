<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** A `SettingsGeneralSettingsItemUpdatedDetail`'s `available_pricing_methods`. */
final class SettingsGeneralSettingsItemUpdatedDetailAvailablePricingMethods extends Dto
{
    public function __construct(
        public readonly ?string $discountBased = null,
        public readonly ?string $markupBased = null,
        public readonly ?string $standard = null,
    ) {
    }
}
