<?php

declare(strict_types=1);

namespace Exsited\Resources\Organisations;

final class OrganisationsUrls
{
    public const SETTINGS_ORGANISATIONS = '/api/{api_version}/settings/organisations';
    public const SETTINGS_ORGANISATION = '/api/{api_version}/settings/organisations/{organisation_id}';

    /** The key the `SETTINGS_ORGANISATIONS` listing's records sit under. */
    public const SETTINGS_ORGANISATIONS_KEY = 'data';

    /** The envelope one `organization` record arrives under. */
    public const ORGANIZATION_KEY = 'organization';
}
