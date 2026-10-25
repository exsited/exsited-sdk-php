<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomEvents;

final class CustomEventsUrls
{
    public const SETTINGS_CUSTOM_EVENTS = '/api/{api_version}/settings/custom_events';
    public const SETTINGS_CUSTOM_EVENT = '/api/{api_version}/settings/custom_events/{custom_event_id}';

    /** The key the `SETTINGS_CUSTOM_EVENTS` listing's records sit under. */
    public const SETTINGS_CUSTOM_EVENTS_KEY = 'data';

    /** The envelope one `custom_event` record arrives under. */
    public const CUSTOM_EVENT_KEY = 'custom_event';
}
