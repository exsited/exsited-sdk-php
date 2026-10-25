<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The PurchaseOrderPurchaseInvoices body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseOrderPurchaseInvoices extends Dto
{
    public const ENVELOPE_KEY = 'purchase_invoice';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/purchase_orders/{purchase_order_id}/purchase_invoices',
    ];

    /** @param list<PurchaseOrderPurchaseInvoicesLine|null>|null $lines */
    public function __construct(
        public readonly ?PurchaseOrderPurchaseInvoicesAccount $account = null,
        public readonly ?array $activityLogs = null,
        public readonly ?string $alternateDueDate = null,
        public readonly ?string $alternateIssueDate = null,
        public readonly ?PurchaseOrderPurchaseInvoicesCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?PurchaseOrderPurchaseInvoicesCurrency $currency = null,
        public readonly ?array $customAttributes = null,
        public readonly mixed $customForm = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $id = null,
        public readonly ?string $issueDate = null,
        public readonly ?PurchaseOrderPurchaseInvoicesKpis $kpis = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly mixed $lastUpdatedOn = null,
        #[ListOf(PurchaseOrderPurchaseInvoicesLine::class)]
        public readonly ?array $lines = null,
        public readonly ?string $object = null,
        public readonly mixed $origin = null,
        public readonly ?string $paymentStatus = null,
        public readonly ?bool $priceTaxInclusive = null,
        public readonly ?PurchaseOrderPurchaseInvoicesPurchaseOrder $purchaseOrder = null,
        public readonly ?string $status = null,
        public readonly ?string $subtotal = null,
        public readonly ?string $tax = null,
        public readonly ?string $total = null,
        public readonly ?string $uuid = null,
        public readonly ?int $version = null,
    ) {
    }
}
