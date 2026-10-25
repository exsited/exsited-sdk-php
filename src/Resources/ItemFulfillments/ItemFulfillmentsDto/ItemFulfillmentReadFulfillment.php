<?php

declare(strict_types=1);

namespace Exsited\Resources\ItemFulfillments\ItemFulfillmentsDto;

use Exsited\Client\Dto;

/** One entry of the `fulfillments` list of ItemFulfillmentRead. */
final class ItemFulfillmentReadFulfillment extends Dto
{
    public function __construct(
        public readonly ?int $fulfillmentIndex = null,
        public readonly ?float $fulfillmentQty = null,
        public readonly ?float $fulfillmentSentQty = null,
        public readonly ?string $id = null,
        public readonly mixed $inventoryTracking = null,
        public readonly ?ItemFulfillmentReadFulfillmentItem $item = null,
        public readonly ?string $object = null,
        public readonly ?float $pendingReturn = null,
        public readonly ?float $returned = null,
        public readonly ?string $servingStatus = null,
        public readonly ?string $uom = null,
        public readonly ?int $uomPrecision = null,
    ) {
    }
}
