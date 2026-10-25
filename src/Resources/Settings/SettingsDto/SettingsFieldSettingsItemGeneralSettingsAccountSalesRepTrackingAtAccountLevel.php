<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** A `SettingsFieldSettingsItemGeneralSettingsAccount`'s `sales_rep_tracking_at_account_level`. */
final class SettingsFieldSettingsItemGeneralSettingsAccountSalesRepTrackingAtAccountLevel extends Dto
{
    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $defaultSalesRepTracking = null,
        public readonly ?string $enabled = null,
    ) {
    }
}
