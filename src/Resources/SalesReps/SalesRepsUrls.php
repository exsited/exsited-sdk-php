<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\SalesReps;

final class SalesRepsUrls
{
    public const SETTINGS_SALES_REPS = '/api/{api_version}/settings/sales_reps';
    public const SETTINGS_SALES_REP = '/api/{api_version}/settings/sales_reps/{sales_rep_id}';

    /** The key the `SETTINGS_SALES_REPS` listing's records sit under. */
    public const SETTINGS_SALES_REPS_KEY = 'data';

    /** The envelope one `sales_rep` record arrives under. */
    public const SALES_REP_KEY = 'sales_rep';
}
