<?php

declare(strict_types=1);

namespace Exsited\Resources\Applications;

final class ApplicationsUrls
{
    public const SETTINGS_APPLICATIONS = '/api/{api_version}/settings/applications';
    public const SETTINGS_APPLICATION = '/api/{api_version}/settings/applications/{application_id}';

    /** The key the `SETTINGS_APPLICATIONS` listing's records sit under. */
    public const SETTINGS_APPLICATIONS_KEY = 'data';

    /** The envelope one `application` record arrives under. */
    public const APPLICATION_KEY = 'application';
}
