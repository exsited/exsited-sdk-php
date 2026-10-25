<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Teams;

final class TeamsUrls
{
    public const SETTINGS_TEAMS = '/api/{api_version}/settings/teams';
    public const SETTINGS_TEAM = '/api/{api_version}/settings/teams/{team_id}';

    /** The key the `SETTINGS_TEAMS` listing's records sit under. */
    public const SETTINGS_TEAMS_KEY = 'data';

    /** The envelope one `team` record arrives under. */
    public const TEAM_KEY = 'team';
}
