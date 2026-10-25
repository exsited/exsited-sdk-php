<?php

declare(strict_types=1);

namespace Exsited\Resources\RentalAssets\RentalAssetsDto;

use Exsited\Client\Dto;

/** The `created_by` object of RentalAssetProfileView. */
final class RentalAssetProfileViewCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
