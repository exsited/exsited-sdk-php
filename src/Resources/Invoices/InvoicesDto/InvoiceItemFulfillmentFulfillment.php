<?php

declare(strict_types=1);

namespace Exsited\Resources\Invoices\InvoicesDto;

use Exsited\Client\Dto;

/** One entry of the `fulfillments` list of InvoiceItemFulfillment. */
final class InvoiceItemFulfillmentFulfillment extends Dto
{
    public function __construct(
        public readonly ?int $fulfillmentIndex = null,
        public readonly ?float $fulfillmentQty = null,
        public readonly ?float $fulfillmentSentQty = null,
        public readonly ?string $id = null,
        public readonly mixed $inventoryTracking = null,
        public readonly ?InvoiceItemFulfillmentFulfillmentItem $item = null,
        public readonly ?string $object = null,
        public readonly ?float $pendingReturn = null,
        public readonly ?float $returned = null,
        public readonly ?string $servingStatus = null,
        public readonly ?string $uom = null,
        public readonly ?int $uomPrecision = null,
    ) {
    }
}
