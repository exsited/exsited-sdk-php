<?php

declare(strict_types=1);

namespace Exsited\Resources\RentalAssets;

final class RentalAssetsUrls
{
    public const RENTAL_ASSET_AVAILABILITY = '/api/{api_version}/rental_asset_availability';
    public const RENTAL_ASSET_PROFILES = '/api/{api_version}/rental_asset_profiles';
    public const RENTAL_ASSETS = '/api/{api_version}/rental_assets';
    public const RENTAL_ASSET_PROFILE = '/api/{api_version}/rental_asset_profiles/{rental_asset_profile_id}';
    public const RENTAL_ASSET = '/api/{api_version}/rental_assets/{rental_asset_uuid}';
    public const RENTAL_ASSET_CANCEL = '/api/{api_version}/rental_assets/{rental_asset_id}/cancel';
    public const RENTAL_ASSET_REACTIVATE = '/api/{api_version}/rental_assets/{rental_asset_id}/reactivate';

    /** The key the `RENTAL_ASSETS` listing's records sit under. */
    public const RENTAL_ASSETS_KEY = 'data';

    /** The key the `RENTAL_ASSET_AVAILABILITY` listing's records sit under. */
    public const RENTAL_ASSET_AVAILABILITY_KEY = 'data';

    /** The key the `RENTAL_ASSET_PROFILES` listing's records sit under. */
    public const RENTAL_ASSET_PROFILES_KEY = 'data';

    /** The envelope one `rental_asset` record arrives under. */
    public const RENTAL_ASSET_KEY = 'rental_asset';
}
