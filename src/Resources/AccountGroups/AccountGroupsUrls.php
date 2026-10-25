<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\AccountGroups;

final class AccountGroupsUrls
{
    public const SETTINGS_ACCOUNT_GROUPS = '/api/{api_version}/settings/account_groups';
    public const SETTINGS_ACCOUNT_GROUP = '/api/{api_version}/settings/account_groups/{account_group_id}';

    /** The key the `SETTINGS_ACCOUNT_GROUPS` listing's records sit under. */
    public const SETTINGS_ACCOUNT_GROUPS_KEY = 'data';

    /** The envelope one `account_group` record arrives under. */
    public const ACCOUNT_GROUP_KEY = 'account_group';
}
