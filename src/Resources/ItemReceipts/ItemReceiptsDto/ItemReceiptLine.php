<?php

declare(strict_types=1);

namespace Exsited\Resources\ItemReceipts\ItemReceiptsDto;

use Exsited\Client\Dto;

/** One entry of the `lines` list of ItemReceipt. */
final class ItemReceiptLine extends Dto
{
    public function __construct(
        public readonly ?ItemReceiptLineItem $item = null,
        public readonly ?float $pendingReturnQuantity = null,
        public readonly ?ItemReceiptLinePurchaseOrderLine $purchaseOrderLine = null,
        public readonly ?float $receiptQuantity = null,
        public readonly ?float $receivedQuantity = null,
        public readonly ?float $returnedQuantity = null,
        public readonly ?ItemReceiptLineUom $uom = null,
        public readonly ?ItemReceiptLineWarehouse $warehouse = null,
    ) {
    }
}
