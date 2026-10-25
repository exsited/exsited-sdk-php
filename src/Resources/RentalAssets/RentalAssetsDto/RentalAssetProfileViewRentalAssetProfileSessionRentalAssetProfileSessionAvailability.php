<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\RentalAssets\RentalAssetsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `rental_asset_profile_session_availability` list of RentalAssetProfileViewRentalAssetProfileSession. */
final class RentalAssetProfileViewRentalAssetProfileSessionRentalAssetProfileSessionAvailability extends Dto
{
    public function __construct(
        public readonly ?bool $available = null,
        public readonly ?string $endTime = null,
        public readonly ?string $id = null,
        public readonly ?string $object = null,
        public readonly ?string $preferredDay = null,
        public readonly ?string $startTime = null,
        public readonly ?string $status = null,
    ) {
    }
}
