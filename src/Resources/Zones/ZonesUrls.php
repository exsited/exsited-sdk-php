<?php

declare(strict_types=1);

namespace Exsited\Resources\Zones;

final class ZonesUrls
{
    public const SETTINGS_ZONES = '/api/{api_version}/settings/zones';
    public const SETTINGS_ZONE = '/api/{api_version}/settings/zones/{zone_id}';

    /** The key the `SETTINGS_ZONES` listing's records sit under. */
    public const SETTINGS_ZONES_KEY = 'data';

    /** The envelope one `zone` record arrives under. */
    public const ZONE_KEY = 'zone';
}
