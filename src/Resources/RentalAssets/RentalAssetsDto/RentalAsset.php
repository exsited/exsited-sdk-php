<?php

declare(strict_types=1);

namespace Exsited\Resources\RentalAssets\RentalAssetsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The RentalAsset body, as measured from the endpoints in MEASURED_FROM. */
final class RentalAsset extends Dto
{
    public const ENVELOPE_KEY = 'rental_asset';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/rental_assets',
        'POST /api/{api_version}/rental_assets',
        'POST /api/{api_version}/rental_assets/{rental_asset_id}/cancel',
        'POST /api/{api_version}/rental_assets/{rental_asset_id}/reactivate',
        'GET /api/{api_version}/rental_assets/{rental_asset_uuid}',
        'PATCH /api/{api_version}/rental_assets/{rental_asset_uuid}',
    ];

    /** @param list<RentalAssetRentalAssetCustomAvailability|null>|null $rentalAssetCustomAvailability */
    public function __construct(
        public readonly ?array $activityLogs = null,
        public readonly ?string $code = null,
        public readonly ?RentalAssetCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?array $customAttributes = null,
        public readonly ?RentalAssetCustomForm $customForm = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $imageName = null,
        public readonly mixed $item = null,
        public readonly ?RentalAssetLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?array $rentalAssetAvailability = null,
        #[ListOf(RentalAssetRentalAssetCustomAvailability::class)]
        public readonly ?array $rentalAssetCustomAvailability = null,
        public readonly ?RentalAssetRentalAssetProfile $rentalAssetProfile = null,
        public readonly ?string $status = null,
        public readonly ?bool $useCustomAvailability = null,
        public readonly ?int $version = null,
    ) {
    }
}
