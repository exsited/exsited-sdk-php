<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ActionScripts;

final class ActionScriptsUrls
{
    public const ACTION_SCRIPTS = '/api/{api_version}/action_scripts';
    public const ACTION_SCRIPT = '/api/{api_version}/action_scripts/{action_script_id}';

    /** The key the `ACTION_SCRIPTS` listing's records sit under. */
    public const ACTION_SCRIPTS_KEY = 'data';

    /** The key the `ACTION_SCRIPT` listing's records sit under. */
    public const ACTION_SCRIPT_KEY = 'action_script';
}
