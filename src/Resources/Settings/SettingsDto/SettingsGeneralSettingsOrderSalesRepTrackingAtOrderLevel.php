<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** A `SettingsGeneralSettingsOrder`'s `sales_rep_tracking_at_order_level`. */
final class SettingsGeneralSettingsOrderSalesRepTrackingAtOrderLevel extends Dto
{
    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $defaultSalesRepTracking = null,
        public readonly ?string $enabled = null,
    ) {
    }
}
