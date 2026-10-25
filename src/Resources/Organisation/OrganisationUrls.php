<?php

declare(strict_types=1);

namespace Exsited\Resources\Organisation;

final class OrganisationUrls
{
    public const SETTINGS_ORGANISATION = '/api/{api_version}/settings/organisation';

    /** The envelope one `organization` record arrives under. */
    public const ORGANIZATION_KEY = 'organization';
}
