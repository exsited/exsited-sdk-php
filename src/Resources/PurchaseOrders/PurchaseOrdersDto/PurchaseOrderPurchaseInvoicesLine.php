<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `lines` list of PurchaseOrderPurchaseInvoices. */
final class PurchaseOrderPurchaseInvoicesLine extends Dto
{
    public function __construct(
        public readonly ?string $accountingCode = null,
        public readonly ?string $id = null,
        public readonly ?PurchaseOrderPurchaseInvoicesLineItem $item = null,
        public readonly ?string $object = null,
        public readonly ?int $quantity = null,
        public readonly ?string $subtotal = null,
        public readonly ?string $tax = null,
        public readonly ?string $total = null,
        public readonly ?string $uom = null,
        public readonly ?int $version = null,
        public readonly ?string $warehouse = null,
    ) {
    }
}
