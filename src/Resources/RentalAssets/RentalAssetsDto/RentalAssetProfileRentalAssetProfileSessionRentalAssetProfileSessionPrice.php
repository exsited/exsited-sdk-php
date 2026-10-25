<?php

declare(strict_types=1);

namespace Exsited\Resources\RentalAssets\RentalAssetsDto;

use Exsited\Client\Dto;

/** One entry of the `rental_asset_profile_session_prices` list of RentalAssetProfileRentalAssetProfileSession. */
final class RentalAssetProfileRentalAssetProfileSessionRentalAssetProfileSessionPrice extends Dto
{
    public function __construct(
        public readonly ?string $id = null,
        public readonly ?bool $isEnabledProRata = null,
        public readonly ?string $object = null,
        public readonly ?float $price = null,
        public readonly ?string $priceType = null,
        public readonly mixed $pricingLevel = null,
        public readonly ?array $rentalAssetProfileSessionPriceHours = null,
        public readonly ?array $rentalAssetProfileSessionPricePeakHourly = null,
        public readonly ?string $status = null,
    ) {
    }
}
