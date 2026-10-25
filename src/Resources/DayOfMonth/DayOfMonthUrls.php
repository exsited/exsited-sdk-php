<?php

declare(strict_types=1);

namespace Exsited\Resources\DayOfMonth;

final class DayOfMonthUrls
{
    public const SETTINGS_DAYS_OF_MONTH = '/api/{api_version}/settings/day_of_month';
    public const SETTINGS_DAY_OF_MONTH = '/api/{api_version}/settings/day_of_month/{day_of_month_id}';

    /** The key the `SETTINGS_DAYS_OF_MONTH` listing's records sit under. */
    public const SETTINGS_DAYS_OF_MONTH_KEY = 'data';

    /** The envelope one `day_of_month` record arrives under. */
    public const DAY_OF_MONTH_KEY = 'day_of_month';
}
