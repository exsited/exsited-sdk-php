<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Sdk\Client\Dto;

/** The PurchaseOrderLine body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseOrderLine extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_orders/{purchase_order_id}/lines',
    ];

    public function __construct(
        public readonly ?string $createdOn = null,
        public readonly ?float $flatDiscount = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?bool $isPriceTaxInclusive = null,
        public readonly ?bool $isTaxExempt = null,
        public readonly ?PurchaseOrderLineItem $item = null,
        public readonly ?PurchaseOrderLineItemAccountingCode $itemAccountingCode = null,
        public readonly ?float $itemDiscountAmount = null,
        public readonly ?string $itemExpectedCompletionDate = null,
        public readonly mixed $itemInvoiceNote = null,
        public readonly ?PurchaseOrderLineItemPriceSnapshot $itemPriceSnapshot = null,
        public readonly ?PurchaseOrderLineItemPriceTax $itemPriceTax = null,
        public readonly ?bool $itemPriceTaxExempt = null,
        public readonly ?PurchaseOrderLineItemPurchaseAccountingCode $itemPurchaseAccountingCode = null,
        public readonly ?PurchaseOrderLineItemPurchaseTaxConfiguration $itemPurchaseTaxConfiguration = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?float $price = null,
        public readonly mixed $purchaseLineNote = null,
        public readonly ?int $quantity = null,
        public readonly ?int $sortIndex = null,
        public readonly ?string $status = null,
        public readonly ?string $subtotal = null,
        public readonly ?PurchaseOrderLineTax $tax = null,
        public readonly ?string $taxTotal = null,
        public readonly ?string $total = null,
        public readonly ?PurchaseOrderLineUom $uom = null,
        public readonly ?int $version = null,
        public readonly ?PurchaseOrderLineWarehouse $warehouse = null,
    ) {
    }
}
