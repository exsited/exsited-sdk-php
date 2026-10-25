<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The Item body, as measured from the endpoints in MEASURED_FROM. */
final class Item extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/items',
    ];

    /** @param list<ItemCode|null>|null $codes
     *  @param list<ItemCurrency|null>|null $currencies
     *  @param list<ItemConfigureVariation|null>|null $configureVariations
     *  @param list<ItemUseVariation|null>|null $useVariations
     *  @param list<ItemBundleDetail|null>|null $bundleDetails
     *  @param list<ItemFamilyDetail|null>|null $familyDetails
     *  @param list<ItemPackageDetail|null>|null $packageDetails */
    public function __construct(
        public readonly mixed $baseUom = null,
        #[ListOf(ItemBundleDetail::class)]
        public readonly ?array $bundleDetails = null,
        public readonly ?bool $child = null,
        #[ListOf(ItemCode::class)]
        public readonly ?array $codes = null,
        #[ListOf(ItemConfigureVariation::class)]
        public readonly ?array $configureVariations = null,
        public readonly ?ItemCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        #[ListOf(ItemCurrency::class)]
        public readonly ?array $currencies = null,
        public readonly ?ItemCustomForm $customForm = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        #[ListOf(ItemFamilyDetail::class)]
        public readonly ?array $familyDetails = null,
        public readonly ?ItemGroup $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $imageUrl = null,
        public readonly ?bool $inventoryEnabled = null,
        public readonly ?string $invoiceNote = null,
        public readonly ?ItemLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?ItemManager $manager = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $origin = null,
        #[ListOf(ItemPackageDetail::class)]
        public readonly ?array $packageDetails = null,
        public readonly ?bool $parent = null,
        public readonly ?string $parentItemId = null,
        public readonly ?bool $purchaseEnabled = null,
        public readonly ?bool $saleEnabled = null,
        public readonly ?string $status = null,
        public readonly ?string $type = null,
        public readonly ?array $uoms = null,
        #[ListOf(ItemUseVariation::class)]
        public readonly ?array $useVariations = null,
        public readonly ?bool $variationsEnabled = null,
        public readonly ?int $version = null,
    ) {
    }
}
