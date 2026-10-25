<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Designations;

final class DesignationsUrls
{
    public const SETTINGS_DESIGNATIONS = '/api/{api_version}/settings/designations';
    public const SETTINGS_DESIGNATION = '/api/{api_version}/settings/designations/{designation_id}';

    /** The key the `SETTINGS_DESIGNATIONS` listing's records sit under. */
    public const SETTINGS_DESIGNATIONS_KEY = 'data';

    /** The envelope one `designation` record arrives under. */
    public const DESIGNATION_KEY = 'designation';
}
