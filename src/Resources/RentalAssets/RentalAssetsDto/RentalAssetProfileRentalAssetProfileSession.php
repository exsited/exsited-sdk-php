<?php

declare(strict_types=1);

namespace Exsited\Resources\RentalAssets\RentalAssetsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One entry of the `rental_asset_profile_sessions` list of RentalAssetProfile. */
final class RentalAssetProfileRentalAssetProfileSession extends Dto
{
    /** @param list<RentalAssetProfileRentalAssetProfileSessionRentalAssetProfileSessionAvailability|null>|null $rentalAssetProfileSessionAvailability
     *  @param list<RentalAssetProfileRentalAssetProfileSessionRentalAssetProfileSessionPrice|null>|null $rentalAssetProfileSessionPrices
     *  @param list<RentalAssetProfileRentalAssetProfileSessionRentalAssetProfileSessionWorkingHour|null>|null $rentalAssetProfileSessionWorkingHours */
    public function __construct(
        public readonly ?string $endDate = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        #[ListOf(RentalAssetProfileRentalAssetProfileSessionRentalAssetProfileSessionAvailability::class)]
        public readonly ?array $rentalAssetProfileSessionAvailability = null,
        #[ListOf(RentalAssetProfileRentalAssetProfileSessionRentalAssetProfileSessionPrice::class)]
        public readonly ?array $rentalAssetProfileSessionPrices = null,
        #[ListOf(RentalAssetProfileRentalAssetProfileSessionRentalAssetProfileSessionWorkingHour::class)]
        public readonly ?array $rentalAssetProfileSessionWorkingHours = null,
        public readonly ?string $startDate = null,
        public readonly ?string $status = null,
    ) {
    }
}
