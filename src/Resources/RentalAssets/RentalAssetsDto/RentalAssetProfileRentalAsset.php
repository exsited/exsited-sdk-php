<?php

declare(strict_types=1);

namespace Exsited\Resources\RentalAssets\RentalAssetsDto;

use Exsited\Client\Dto;

/** One entry of the `rental_assets` list of RentalAssetProfile. */
final class RentalAssetProfileRentalAsset extends Dto
{
    public function __construct(
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $imageName = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $status = null,
        public readonly ?bool $useCustomAvailability = null,
    ) {
    }
}
