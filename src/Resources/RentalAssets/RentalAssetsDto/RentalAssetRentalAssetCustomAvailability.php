<?php

declare(strict_types=1);

namespace Exsited\Resources\RentalAssets\RentalAssetsDto;

use Exsited\Client\Dto;

/** One entry of the `rental_asset_custom_availability` list of RentalAsset. */
final class RentalAssetRentalAssetCustomAvailability extends Dto
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
