<?php

declare(strict_types=1);

namespace Exsited\Resources\TimePeriods;

final class TimePeriodsUrls
{
    public const SETTINGS_TIME_PERIODS = '/api/{api_version}/settings/time_periods';
    public const SETTINGS_TIME_PERIOD = '/api/{api_version}/settings/time_periods/{time_period_id}';

    /** The key the `SETTINGS_TIME_PERIODS` listing's records sit under. */
    public const SETTINGS_TIME_PERIODS_KEY = 'data';

    /** The envelope one `time_period` record arrives under. */
    public const TIME_PERIOD_KEY = 'time_period';
}
