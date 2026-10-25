<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items\ItemsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The ItemsView body, as measured from the endpoints in MEASURED_FROM. */
final class ItemsView extends Dto
{
    public const ENVELOPE_KEY = 'item';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/items',
    ];

    /** @param list<ItemsViewCode|null>|null $codes */
    public function __construct(
        public readonly ?array $activityLogs = null,
        public readonly mixed $baseUom = null,
        public readonly ?array $bundleDetails = null,
        public readonly ?bool $child = null,
        #[ListOf(ItemsViewCode::class)]
        public readonly ?array $codes = null,
        public readonly ?ItemsViewCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?array $currencies = null,
        public readonly ?array $customAttributes = null,
        public readonly ?ItemsViewCustomForm $customForm = null,
        public readonly ?array $customObjects = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?array $familyDetails = null,
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $imageUrl = null,
        public readonly mixed $inventories = null,
        public readonly ?bool $inventoryEnabled = null,
        public readonly ?string $invoiceNote = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly mixed $lastUpdatedOn = null,
        public readonly mixed $manager = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $origin = null,
        public readonly ?array $packageDetails = null,
        public readonly ?bool $parent = null,
        public readonly mixed $purchase = null,
        public readonly ?bool $purchaseEnabled = null,
        public readonly mixed $sale = null,
        public readonly ?bool $saleEnabled = null,
        public readonly ?string $status = null,
        public readonly ?string $type = null,
        public readonly ?array $uoms = null,
        public readonly ?bool $variationsEnabled = null,
        public readonly ?int $version = null,
    ) {
    }
}
