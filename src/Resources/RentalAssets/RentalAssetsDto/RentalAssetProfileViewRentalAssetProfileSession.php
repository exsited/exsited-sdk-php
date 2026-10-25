<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\RentalAssets\RentalAssetsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One entry of the `rental_asset_profile_sessions` list of RentalAssetProfileView. */
final class RentalAssetProfileViewRentalAssetProfileSession extends Dto
{
    /** @param list<RentalAssetProfileViewRentalAssetProfileSessionRentalAssetProfileSessionAvailability|null>|null $rentalAssetProfileSessionAvailability
     *  @param list<RentalAssetProfileViewRentalAssetProfileSessionRentalAssetProfileSessionPrice|null>|null $rentalAssetProfileSessionPrices
     *  @param list<RentalAssetProfileViewRentalAssetProfileSessionRentalAssetProfileSessionWorkingHour|null>|null $rentalAssetProfileSessionWorkingHours */
    public function __construct(
        public readonly ?string $endDate = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        #[ListOf(RentalAssetProfileViewRentalAssetProfileSessionRentalAssetProfileSessionAvailability::class)]
        public readonly ?array $rentalAssetProfileSessionAvailability = null,
        #[ListOf(RentalAssetProfileViewRentalAssetProfileSessionRentalAssetProfileSessionPrice::class)]
        public readonly ?array $rentalAssetProfileSessionPrices = null,
        #[ListOf(RentalAssetProfileViewRentalAssetProfileSessionRentalAssetProfileSessionWorkingHour::class)]
        public readonly ?array $rentalAssetProfileSessionWorkingHours = null,
        public readonly ?string $startDate = null,
        public readonly ?string $status = null,
    ) {
    }
}
