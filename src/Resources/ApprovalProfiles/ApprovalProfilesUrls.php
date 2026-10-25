<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ApprovalProfiles;

final class ApprovalProfilesUrls
{
    public const SETTINGS_APPROVAL_PROFILES = '/api/{api_version}/settings/approval_profiles';
    public const SETTINGS_APPROVAL_PROFILE = '/api/{api_version}/settings/approval_profiles/{approval_profile_id}';

    /** The key the `SETTINGS_APPROVAL_PROFILES` listing's records sit under. */
    public const SETTINGS_APPROVAL_PROFILES_KEY = 'data';

    /** The envelope one `approval_profile` record arrives under. */
    public const APPROVAL_PROFILE_KEY = 'approval_profile';
}
