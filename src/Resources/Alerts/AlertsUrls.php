<?php

declare(strict_types=1);

namespace Exsited\Resources\Alerts;

final class AlertsUrls
{
    public const ALERTS = '/api/{api_version}/alerts';
    public const ALERT = '/api/{api_version}/alerts/{alert_id}';
    public const ALERTS_ACCOUNT_BY_ID = '/api/{api_version}/alerts/account/{account_id}';
    public const ALERTS_EMPLOYEE_BY_ID = '/api/{api_version}/alerts/employee/{employee_id}';
    public const ALERTS_LABOUR_BY_ID = '/api/{api_version}/alerts/labour/{labour_id}';

    /** The key the `ALERTS_ACCOUNT_BY_ID` listing's records sit under. */
    public const ALERTS_ACCOUNT_BY_ID_KEY = 'data';

    /** The key the `ALERTS` listing's records sit under. */
    public const ALERTS_KEY = 'data';
}
