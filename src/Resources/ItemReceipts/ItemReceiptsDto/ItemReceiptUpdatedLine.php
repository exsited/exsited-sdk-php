<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ItemReceipts\ItemReceiptsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `lines` list of ItemReceiptUpdated. */
final class ItemReceiptUpdatedLine extends Dto
{
    public function __construct(
        public readonly ?ItemReceiptUpdatedLineItem $item = null,
        public readonly ?float $pendingReturnQuantity = null,
        public readonly ?ItemReceiptUpdatedLinePurchaseOrderLine $purchaseOrderLine = null,
        public readonly ?float $receiptQuantity = null,
        public readonly ?float $receivedQuantity = null,
        public readonly ?float $returnedQuantity = null,
        public readonly ?ItemReceiptUpdatedLineUom $uom = null,
        public readonly ?ItemReceiptUpdatedLineWarehouse $warehouse = null,
    ) {
    }
}
