<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\RentalAssets\RentalAssetsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The RentalAssetProfile body, as measured from the endpoints in MEASURED_FROM. */
final class RentalAssetProfile extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/rental_asset_profiles',
    ];

    /** @param list<RentalAssetProfileRentalAssetProfileSession|null>|null $rentalAssetProfileSessions
     *  @param list<RentalAssetProfileRentalAsset|null>|null $rentalAssets */
    public function __construct(
        public readonly ?RentalAssetProfileCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?RentalAssetProfileCurrency $currency = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?bool $isTaxInclusive = null,
        public readonly ?RentalAssetProfileLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly mixed $maxBookingLimit = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        #[ListOf(RentalAssetProfileRentalAssetProfileSession::class)]
        public readonly ?array $rentalAssetProfileSessions = null,
        #[ListOf(RentalAssetProfileRentalAsset::class)]
        public readonly ?array $rentalAssets = null,
        public readonly ?string $status = null,
        public readonly mixed $tax = null,
        public readonly ?int $version = null,
    ) {
    }
}
