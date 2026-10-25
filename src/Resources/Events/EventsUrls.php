<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Events;

final class EventsUrls
{
    public const EVENTS = '/api/{api_version}/events';
    public const EVENT = '/api/{api_version}/events/{event_uuid}';
    public const EVENT_EXECUTE = '/api/{api_version}/events/{event_uuid}/execute';
    public const EVENT_REMOVE = '/api/{api_version}/events/{event_uuid}/remove';

    /** The key the `EVENTS` listing's records sit under. */
    public const EVENTS_KEY = 'data';

    /** The envelope one `event` record arrives under. */
    public const EVENT_KEY = 'event';
}
