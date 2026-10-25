<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Sdk\Client\Dto;

/** The `item_purchase_accounting_code` object of PurchaseOrderLine. */
final class PurchaseOrderLineItemPurchaseAccountingCode extends Dto
{
    public function __construct(
        public readonly ?string $costOfGoodsSold = null,
    ) {
    }
}
