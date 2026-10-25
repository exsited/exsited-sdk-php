<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Client\Dto;

/** The `item_purchase_accounting_code` object of PurchaseOrderLineReadDetail. */
final class PurchaseOrderLineReadDetailItemPurchaseAccountingCode extends Dto
{
    public function __construct(
        public readonly ?string $costOfGoodsSold = null,
    ) {
    }
}
