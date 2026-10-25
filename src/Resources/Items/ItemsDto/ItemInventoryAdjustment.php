<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;

/** The ItemInventoryAdjustment body, as measured from the endpoints in MEASURED_FROM. */
final class ItemInventoryAdjustment extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/items/{item_id}/inventory_adjustments',
    ];

    public function __construct(
        public readonly ?string $adjustmentAmount = null,
        public readonly ?string $adjustmentType = null,
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $itemId = null,
        public readonly ?string $itemName = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?string $quantityAvailable = null,
        public readonly ?string $quantityOnHand = null,
        public readonly ?string $quantityOnOrder = null,
        public readonly ?string $quantityOnPurchaseReturn = null,
        public readonly ?string $quantityOnReserve = null,
        public readonly ?string $quantityOnReturn = null,
        public readonly ?string $quantityPromised = null,
        public readonly ?string $reference = null,
        public readonly ?string $status = null,
        public readonly ?string $warehouseName = null,
    ) {
    }
}
