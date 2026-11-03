<?php

declare(strict_types=1);

namespace Exsited\Resources\OperatorGroups;

final class OperatorGroupsUrls
{
    public const SETTINGS_OPERATOR_GROUPS = '/api/{api_version}/settings/operator_groups';
    public const SETTINGS_OPERATOR_GROUP = '/api/{api_version}/settings/operator_groups/{operator_group_id}';

    /** The key the `SETTINGS_OPERATOR_GROUPS` listing's records sit under. */
    public const SETTINGS_OPERATOR_GROUPS_KEY = 'data';

    /** The envelope one `operator_group` record arrives under. */
    public const OPERATOR_GROUP_KEY = 'operator_group';
}
