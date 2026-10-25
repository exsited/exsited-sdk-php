<?php

declare(strict_types=1);

namespace Exsited\Resources\SystemEvents;

final class SystemEventsUrls
{
    public const SETTINGS_SYSTEM_EVENTS = '/api/{api_version}/settings/system_events';
    public const SETTINGS_SYSTEM_EVENT = '/api/{api_version}/settings/system_events/{system_event_id}';

    /** The key the `SETTINGS_SYSTEM_EVENTS` listing's records sit under. */
    public const SETTINGS_SYSTEM_EVENTS_KEY = 'data';

    /** The envelope one `system_event` record arrives under. */
    public const SYSTEM_EVENT_KEY = 'system_event';
}
