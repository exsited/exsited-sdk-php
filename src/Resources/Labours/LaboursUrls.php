<?php

declare(strict_types=1);

namespace Exsited\Resources\Labours;

final class LaboursUrls
{
    public const LABOUR_AVAILABILITY = '/api/{api_version}/labour_availability';
    public const LABOUR_PROFILES = '/api/{api_version}/labour_profiles';
    public const LABOURS = '/api/{api_version}/labours';
    public const LABOUR_PROFILE = '/api/{api_version}/labour_profiles/{labour_profile_id}';
    public const LABOURS_AVAILABLE_FOR_BOOKING = '/api/{api_version}/labours/available_for_booking';
    public const LABOUR = '/api/{api_version}/labours/{labour_uuid}';
    public const LABOUR_CANCEL = '/api/{api_version}/labours/{labour_id}/cancel';
    public const LABOUR_REACTIVATE = '/api/{api_version}/labours/{labour_id}/reactivate';
    public const LABOUR_ORDERS = '/api/{api_version}/labours/{labour_uuid}/orders';
    public const LABOUR_PROFILE_SESSIONS = '/api/{api_version}/labour_profiles/{labour_profile_id}/sessions';
    public const LABOUR_PROFILE_SESSION = '/api/{api_version}/labour_profiles/{labour_profile_id}/sessions/{session_id}';
    public const LABOUR_CALENDAR = '/api/{api_version}/labours/{labour_id}/availability';

    /** The key the `LABOURS_AVAILABLE_FOR_BOOKING` listing's records sit under. */
    public const LABOURS_AVAILABLE_FOR_BOOKING_KEY = 'data';

    /** The key the `LABOURS` listing's records sit under. */
    public const LABOURS_KEY = 'data';

    /** The key the `LABOUR_AVAILABILITY` listing's records sit under. */
    public const LABOUR_AVAILABILITY_KEY = 'data';

    /** The key the `LABOUR_PROFILES` listing's records sit under. */
    public const LABOUR_PROFILES_KEY = 'data';

    /** The envelope one `labour` record arrives under. */
    public const LABOUR_KEY = 'labour';

    /** The key the `LABOUR_PROFILE_SESSIONS` listing's records sit under. */
    public const LABOUR_PROFILE_SESSIONS_KEY = 'data';

    /** The key the `LABOUR_CALENDAR` listing's records sit under. */
    public const LABOUR_CALENDAR_KEY = 'labour_calendar';

    /** The key the `LABOUR_PROFILE_SESSION` listing's records sit under. */
    public const LABOUR_PROFILE_SESSION_KEY = 'labour_profile_session';
}
