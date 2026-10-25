<?php

declare(strict_types=1);

namespace Exsited\Resources\ItemReceipts\ItemReceiptsDto;

use Exsited\Client\Dto;

/** The `purchase_order` object of ItemReceiptUpdated. */
final class ItemReceiptUpdatedPurchaseOrder extends Dto
{
    public function __construct(
        public readonly ?string $code = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $object = null,
    ) {
    }
}
