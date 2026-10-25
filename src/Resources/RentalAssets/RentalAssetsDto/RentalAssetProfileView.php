<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\RentalAssets\RentalAssetsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The RentalAssetProfileView body, as measured from the endpoints in MEASURED_FROM. */
final class RentalAssetProfileView extends Dto
{
    public const ENVELOPE_KEY = 'rental_asset_profile';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/rental_asset_profiles',
        'GET /api/{api_version}/rental_asset_profiles/{rental_asset_profile_id}',
    ];

    /** @param list<RentalAssetProfileViewRentalAssetProfileSession|null>|null $rentalAssetProfileSessions
     *  @param list<RentalAssetProfileViewRentalAsset|null>|null $rentalAssets */
    public function __construct(
        public readonly ?array $activityLogs = null,
        public readonly ?RentalAssetProfileViewCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?RentalAssetProfileViewCurrency $currency = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?bool $isTaxInclusive = null,
        public readonly ?RentalAssetProfileViewLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly mixed $maxBookingLimit = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        #[ListOf(RentalAssetProfileViewRentalAssetProfileSession::class)]
        public readonly ?array $rentalAssetProfileSessions = null,
        #[ListOf(RentalAssetProfileViewRentalAsset::class)]
        public readonly ?array $rentalAssets = null,
        public readonly ?string $status = null,
        public readonly mixed $tax = null,
        public readonly ?int $version = null,
    ) {
    }
}
