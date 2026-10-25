<?php

declare(strict_types=1);

namespace Exsited\Resources\AlertResponsibility;

final class AlertResponsibilityUrls
{
    public const ALERT_RESPONSIBILITIES = '/api/{api_version}/alert_responsibility';
    public const ALERT_RESPONSIBILITY = '/api/{api_version}/alert_responsibility/{alert_responsibility_id}';

    /** The key the `ALERT_RESPONSIBILITIES` listing's records sit under. */
    public const ALERT_RESPONSIBILITIES_KEY = 'data';

    /** The key the `ALERT_RESPONSIBILITY` listing's records sit under. */
    public const ALERT_RESPONSIBILITY_KEY = 'alert_responsibility';
}
