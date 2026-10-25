<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Roles;

final class RolesUrls
{
    public const SETTINGS_ROLES = '/api/{api_version}/settings/roles';
    public const SETTINGS_ROLE = '/api/{api_version}/settings/roles/{role_id}';

    /** The key the `SETTINGS_ROLES` listing's records sit under. */
    public const SETTINGS_ROLES_KEY = 'data';

    /** The envelope one `role` record arrives under. */
    public const ROLE_KEY = 'role';
}
