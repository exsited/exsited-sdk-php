<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Client\Dto;

/** The PurchaseOrderPurchaseInvoice body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseOrderPurchaseInvoice extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_orders/{purchase_order_id}/purchase_invoices',
    ];

    public function __construct(
        public readonly ?PurchaseOrderPurchaseInvoiceAccount $account = null,
        public readonly ?string $alternateDueDate = null,
        public readonly ?string $alternateIssueDate = null,
        public readonly ?PurchaseOrderPurchaseInvoiceCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?PurchaseOrderPurchaseInvoiceCurrency $currency = null,
        public readonly mixed $customForm = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $id = null,
        public readonly ?string $issueDate = null,
        public readonly ?PurchaseOrderPurchaseInvoiceLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?string $origin = null,
        public readonly ?string $paymentStatus = null,
        public readonly ?bool $priceTaxInclusive = null,
        public readonly ?PurchaseOrderPurchaseInvoicePurchaseOrder $purchaseOrder = null,
        public readonly ?string $status = null,
        public readonly ?string $subtotal = null,
        public readonly ?string $tax = null,
        public readonly ?string $total = null,
        public readonly ?string $uuid = null,
        public readonly ?int $version = null,
    ) {
    }
}
