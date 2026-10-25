<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\SettingsWorkflows;

final class SettingsWorkflowsUrls
{
    public const SETTINGS_WORKFLOWS = '/api/{api_version}/settings/workflows';
    public const SETTINGS_WORKFLOW = '/api/{api_version}/settings/workflows/{workflow_id}';

    /** The key the `SETTINGS_WORKFLOWS` listing's records sit under. */
    public const SETTINGS_WORKFLOWS_KEY = 'data';

    /** The envelope one `workflow` record arrives under. */
    public const WORKFLOW_KEY = 'workflow';
}
