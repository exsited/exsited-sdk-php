<?php

declare(strict_types=1);

namespace Exsited\Resources\ItemReceipts\ItemReceiptsDto;

use Exsited\Client\Dto;

/** The `purchase_order_line` object of ItemReceiptUpdatedLine. */
final class ItemReceiptUpdatedLinePurchaseOrderLine extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
