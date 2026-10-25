<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CommunicationProfiles;

final class CommunicationProfilesUrls
{
    public const SETTINGS_COMMUNICATION_PROFILES = '/api/{api_version}/settings/communication_profiles';
    public const SETTINGS_COMMUNICATION_PROFILE = '/api/{api_version}/settings/communication_profiles/{communication_profile_id}';

    /** The key the `SETTINGS_COMMUNICATION_PROFILES` listing's records sit under. */
    public const SETTINGS_COMMUNICATION_PROFILES_KEY = 'data';

    /** The envelope one `communication_profile` record arrives under. */
    public const COMMUNICATION_PROFILE_KEY = 'communication_profile';
}
