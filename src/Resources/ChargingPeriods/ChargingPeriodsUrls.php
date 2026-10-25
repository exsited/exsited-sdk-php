<?php

declare(strict_types=1);

namespace Exsited\Resources\ChargingPeriods;

final class ChargingPeriodsUrls
{
    public const SETTINGS_CHARGING_PERIODS = '/api/{api_version}/settings/charging_periods';
    public const SETTINGS_CHARGING_PERIOD = '/api/{api_version}/settings/charging_periods/{charging_period_id}';

    /** The key the `SETTINGS_CHARGING_PERIODS` listing's records sit under. */
    public const SETTINGS_CHARGING_PERIODS_KEY = 'data';

    /** The envelope one `charging_period` record arrives under. */
    public const CHARGING_PERIOD_KEY = 'charging_period';
}
