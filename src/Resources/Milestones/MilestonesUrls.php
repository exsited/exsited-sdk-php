<?php

declare(strict_types=1);

namespace Exsited\Resources\Milestones;

final class MilestonesUrls
{
    public const MILESTONES = '/api/{api_version}/milestones';
    public const MILESTONES_ACCOUNT_BY_ID = '/api/{api_version}/milestones/account/{account_id}';
    public const MILESTONES_LABOUR_BY_ID = '/api/{api_version}/milestones/labour/{labour_id}';
    public const MILESTONES_EMPLOYEE_BY_CODE = '/api/{api_version}/milestones/employee/{employee_code}';
    public const MILESTONE = '/api/{api_version}/milestones/{milestone_uuid}';

    /** The key the `MILESTONES_ACCOUNT_BY_ID` listing's records sit under. */
    public const MILESTONES_ACCOUNT_BY_ID_KEY = 'data';

    /** The key the `MILESTONES` listing's records sit under. */
    public const MILESTONES_KEY = 'data';

    /** The key the `MILESTONES_EMPLOYEE_BY_CODE` listing's records sit under. */
    public const MILESTONES_EMPLOYEE_BY_CODE_KEY = 'data';

    /** The key the `MILESTONE` listing's records sit under. */
    public const MILESTONE_KEY = 'milestone';
}
