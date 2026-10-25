<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Client\Dto;

/** The `purchase_order_line` object of PurchaseOrderLineRead. */
final class PurchaseOrderLineReadDetail extends Dto
{
    public function __construct(
        public readonly ?string $createdOn = null,
        public readonly ?float $flatDiscount = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?bool $isPriceTaxInclusive = null,
        public readonly ?bool $isTaxExempt = null,
        public readonly ?PurchaseOrderLineReadDetailItem $item = null,
        public readonly ?PurchaseOrderLineReadDetailItemAccountingCode $itemAccountingCode = null,
        public readonly ?float $itemDiscountAmount = null,
        public readonly ?string $itemExpectedCompletionDate = null,
        public readonly mixed $itemInvoiceNote = null,
        public readonly ?PurchaseOrderLineReadDetailItemPriceSnapshot $itemPriceSnapshot = null,
        public readonly ?PurchaseOrderLineReadDetailItemPriceTax $itemPriceTax = null,
        public readonly ?bool $itemPriceTaxExempt = null,
        public readonly ?PurchaseOrderLineReadDetailItemPurchaseAccountingCode $itemPurchaseAccountingCode = null,
        public readonly ?PurchaseOrderLineReadDetailItemPurchaseTaxConfiguration $itemPurchaseTaxConfiguration = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?float $price = null,
        public readonly mixed $purchaseLineNote = null,
        public readonly ?int $quantity = null,
        public readonly ?int $sortIndex = null,
        public readonly ?string $status = null,
        public readonly ?string $subtotal = null,
        public readonly ?PurchaseOrderLineReadDetailTax $tax = null,
        public readonly ?string $taxTotal = null,
        public readonly ?string $total = null,
        public readonly ?PurchaseOrderLineReadDetailUom $uom = null,
        public readonly ?int $version = null,
        public readonly ?PurchaseOrderLineReadDetailWarehouse $warehouse = null,
    ) {
    }
}
