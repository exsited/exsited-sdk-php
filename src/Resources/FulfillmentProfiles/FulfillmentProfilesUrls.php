<?php

declare(strict_types=1);

namespace Exsited\Resources\FulfillmentProfiles;

final class FulfillmentProfilesUrls
{
    public const SETTINGS_FULFILLMENT_PROFILES = '/api/{api_version}/settings/fulfillment_profiles';
    public const SETTINGS_FULFILLMENT_PROFILE = '/api/{api_version}/settings/fulfillment_profiles/{fulfillment_profile_id}';

    /** The key the `SETTINGS_FULFILLMENT_PROFILES` listing's records sit under. */
    public const SETTINGS_FULFILLMENT_PROFILES_KEY = 'data';

    /** The envelope one `fulfillment_profile` record arrives under. */
    public const FULFILLMENT_PROFILE_KEY = 'fulfillment_profile';
}
