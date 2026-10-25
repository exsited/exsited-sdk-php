<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items\ItemsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The ItemRead body, as measured from the endpoints in MEASURED_FROM. */
final class ItemRead extends Dto
{
    public const ENVELOPE_KEY = 'item';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/items/{item_id}',
        'PATCH /api/{api_version}/items/{item_id}/bundle_details',
        'POST /api/{api_version}/items/{item_id}/deactivate',
        'GET /api/{api_version}/items/{item_id}/family_details',
        'POST /api/{api_version}/items/{item_id}/family_details',
        'POST /api/{api_version}/items/{item_id}/image',
        'POST /api/{api_version}/items/{item_id}/inventory/add',
        'GET /api/{api_version}/items/{item_id}/package_details',
        'POST /api/{api_version}/items/{item_id}/package_details',
        'GET /api/{api_version}/items/{item_id}/package_details/{package_detail_id}',
        'POST /api/{api_version}/items/{item_id}/reactivate',
        'PATCH /api/{api_version}/items/{item_id}/variations',
    ];

    /** @param list<ItemReadCode|null>|null $codes
     *  @param list<ItemReadCurrency|null>|null $currencies
     *  @param list<ItemReadCustomAttribute|null>|null $customAttributes
     *  @param list<ItemReadConfigureVariation|null>|null $configureVariations
     *  @param list<ItemReadBundleDetail|null>|null $bundleDetails
     *  @param list<ItemReadFamilyDetail|null>|null $familyDetails
     *  @param list<ItemReadPackageDetail|null>|null $packageDetails
     *  @param list<ItemReadUseVariation|null>|null $useVariations */
    public function __construct(
        public readonly ?array $activityLogs = null,
        public readonly mixed $baseUom = null,
        #[ListOf(ItemReadBundleDetail::class)]
        public readonly ?array $bundleDetails = null,
        public readonly ?bool $child = null,
        #[ListOf(ItemReadCode::class)]
        public readonly ?array $codes = null,
        #[ListOf(ItemReadConfigureVariation::class)]
        public readonly ?array $configureVariations = null,
        public readonly ?ItemReadCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        #[ListOf(ItemReadCurrency::class)]
        public readonly ?array $currencies = null,
        #[ListOf(ItemReadCustomAttribute::class)]
        public readonly ?array $customAttributes = null,
        public readonly ?ItemReadCustomForm $customForm = null,
        public readonly ?array $customObjects = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        #[ListOf(ItemReadFamilyDetail::class)]
        public readonly ?array $familyDetails = null,
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $imageUrl = null,
        public readonly ?ItemReadInventories $inventories = null,
        public readonly ?bool $inventoryEnabled = null,
        public readonly ?string $invoiceNote = null,
        public readonly ?ItemReadLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?ItemReadManager $manager = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $origin = null,
        #[ListOf(ItemReadPackageDetail::class)]
        public readonly ?array $packageDetails = null,
        public readonly ?bool $parent = null,
        public readonly ?string $parentItemId = null,
        public readonly ?ItemReadPurchase $purchase = null,
        public readonly ?bool $purchaseEnabled = null,
        public readonly ?ItemReadSale $sale = null,
        public readonly ?bool $saleEnabled = null,
        public readonly ?string $status = null,
        public readonly ?string $type = null,
        public readonly ?array $uoms = null,
        #[ListOf(ItemReadUseVariation::class)]
        public readonly ?array $useVariations = null,
        public readonly ?bool $variationsEnabled = null,
        public readonly ?int $version = null,
    ) {
    }
}
