<?php

declare(strict_types=1);

namespace Exsited\Resources\BillingPeriods;

final class BillingPeriodsUrls
{
    public const SETTINGS_BILLING_PERIODS = '/api/{api_version}/settings/billing_periods';
    public const SETTINGS_BILLING_PERIOD = '/api/{api_version}/settings/billing_periods/{billing_period_id}';

    /** The key the `SETTINGS_BILLING_PERIODS` listing's records sit under. */
    public const SETTINGS_BILLING_PERIODS_KEY = 'data';

    /** The envelope one `billing_period` record arrives under. */
    public const BILLING_PERIOD_KEY = 'billing_period';
}
