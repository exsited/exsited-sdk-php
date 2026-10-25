<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\AlertResponsibilities;

final class AlertResponsibilitiesUrls
{
    public const SETTINGS_ALERT_RESPONSIBILITIES = '/api/{api_version}/settings/alert_responsibilities';
    public const SETTINGS_ALERT_RESPONSIBILITY = '/api/{api_version}/settings/alert_responsibilities/{alert_responsibility_id}';

    /** The key the `SETTINGS_ALERT_RESPONSIBILITIES` listing's records sit under. */
    public const SETTINGS_ALERT_RESPONSIBILITIES_KEY = 'data';

    /** The envelope one `alert_responsibility` record arrives under. */
    public const ALERT_RESPONSIBILITY_KEY = 'alert_responsibility';
}
