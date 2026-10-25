<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The ItemSaleRead body, as measured from the endpoints in MEASURED_FROM. */
final class ItemSaleRead extends Dto
{
    public const ENVELOPE_KEY = 'item';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/items/{item_id}/sale',
        'POST /api/{api_version}/items/{item_id}/sale',
    ];

    /** @param list<ItemSaleReadCode|null>|null $codes
     *  @param list<ItemSaleReadCurrency|null>|null $currencies */
    public function __construct(
        public readonly ?array $activityLogs = null,
        public readonly mixed $baseUom = null,
        public readonly ?bool $child = null,
        #[ListOf(ItemSaleReadCode::class)]
        public readonly ?array $codes = null,
        public readonly ?ItemSaleReadCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        #[ListOf(ItemSaleReadCurrency::class)]
        public readonly ?array $currencies = null,
        public readonly ?array $customAttributes = null,
        public readonly ?ItemSaleReadCustomForm $customForm = null,
        public readonly ?array $customObjects = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly int|string|null $id = null,
        public readonly mixed $imageUrl = null,
        public readonly ?bool $inventoryEnabled = null,
        public readonly mixed $invoiceNote = null,
        public readonly ?ItemSaleReadLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly mixed $manager = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly mixed $origin = null,
        public readonly ?bool $parent = null,
        public readonly ?bool $purchaseEnabled = null,
        public readonly ?ItemSaleReadSale $sale = null,
        public readonly ?bool $saleEnabled = null,
        public readonly ?string $status = null,
        public readonly ?string $type = null,
        public readonly ?array $uoms = null,
        public readonly ?bool $variationsEnabled = null,
        public readonly ?int $version = null,
    ) {
    }
}
