<?php

declare(strict_types=1);

namespace Exsited\Resources\RentalAssets\RentalAssetsDto;

use Exsited\Client\Dto;

/** One entry of the `rental_asset_profile_session_working_hours` list of RentalAssetProfileViewRentalAssetProfileSession. */
final class RentalAssetProfileViewRentalAssetProfileSessionRentalAssetProfileSessionWorkingHour extends Dto
{
    public function __construct(
        public readonly ?string $endTime = null,
        public readonly ?string $id = null,
        public readonly ?string $object = null,
        public readonly ?string $startTime = null,
        public readonly ?string $status = null,
    ) {
    }
}
