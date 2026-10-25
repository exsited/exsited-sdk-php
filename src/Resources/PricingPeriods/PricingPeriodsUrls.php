<?php

declare(strict_types=1);

namespace Exsited\Resources\PricingPeriods;

final class PricingPeriodsUrls
{
    public const SETTINGS_PRICING_PERIODS = '/api/{api_version}/settings/pricing_periods';
    public const SETTINGS_PRICING_PERIOD = '/api/{api_version}/settings/pricing_periods/{pricing_period_id}';

    /** The key the `SETTINGS_PRICING_PERIODS` listing's records sit under. */
    public const SETTINGS_PRICING_PERIODS_KEY = 'data';

    /** The envelope one `pricing_period` record arrives under. */
    public const PRICING_PERIOD_KEY = 'pricing_period';
}
