<?php

declare(strict_types=1);

namespace Exsited\Resources\ApprovalUserGroups;

final class ApprovalUserGroupsUrls
{
    public const SETTINGS_APPROVAL_USER_GROUPS = '/api/{api_version}/settings/approval_user_groups';
    public const SETTINGS_APPROVAL_USER_GROUP = '/api/{api_version}/settings/approval_user_groups/{approval_user_group_id}';

    /** The key the `SETTINGS_APPROVAL_USER_GROUPS` listing's records sit under. */
    public const SETTINGS_APPROVAL_USER_GROUPS_KEY = 'data';

    /** The envelope one `approval_user_group` record arrives under. */
    public const APPROVAL_USER_GROUP_KEY = 'approval_user_group';
}
