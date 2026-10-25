<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Timesheets;

final class TimesheetsUrls
{
    public const TIMESHEETS = '/api/{api_version}/timesheets';
    public const TIMESHEET = '/api/{api_version}/timesheets/{timesheet_id}';

    /** The key the `TIMESHEETS` listing's records sit under. */
    public const TIMESHEETS_KEY = 'data';
}
