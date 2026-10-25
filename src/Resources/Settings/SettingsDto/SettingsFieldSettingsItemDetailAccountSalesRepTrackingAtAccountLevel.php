<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** The `sales_rep_tracking_at_account_level` object of SettingsFieldSettingsItemDetailAccount. */
final class SettingsFieldSettingsItemDetailAccountSalesRepTrackingAtAccountLevel extends Dto
{
    public function __construct(
        public readonly mixed $defaultSalesRepTracking = null,
        public readonly ?string $enabled = null,
    ) {
    }
}
