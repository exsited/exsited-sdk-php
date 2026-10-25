<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\WireName;

/** A `SettingsGeneralSettings`'s `dashboard`. */
final class SettingsGeneralSettingsDashboard extends Dto
{
    public function __construct(
        public readonly ?string $accounting = null,
        /** Null in every record measured, so untyped. */
        #[WireName('defaultDashboard')]
        public readonly mixed $defaultDashboard = null,
        public readonly ?string $executive = null,
        public readonly ?string $finance = null,
        public readonly ?string $production = null,
        public readonly ?string $purchase = null,
        public readonly ?string $sales = null,
    ) {
    }
}
