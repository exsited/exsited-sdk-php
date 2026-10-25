<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Client\Dto;

/** The PurchaseInvoice body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseInvoice extends Dto
{
    public const ENVELOPE_KEY = 'purchase_invoice';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_invoices',
        'GET /api/{api_version}/purchase_invoices/{purchase_invoice_id}/information',
        'GET /api/{api_version}/purchase_orders/{purchase_order_id}/purchase_invoices',
    ];

    public function __construct(
        public readonly ?PurchaseInvoiceAccount $account = null,
        public readonly ?string $alternateDueDate = null,
        public readonly ?string $alternateIssueDate = null,
        public readonly ?PurchaseInvoiceCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?PurchaseInvoiceCurrency $currency = null,
        public readonly mixed $customForm = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $id = null,
        public readonly ?string $issueDate = null,
        public readonly ?PurchaseInvoiceLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?string $origin = null,
        public readonly ?string $paymentStatus = null,
        public readonly ?bool $priceTaxInclusive = null,
        public readonly ?PurchaseInvoicePurchaseOrder $purchaseOrder = null,
        public readonly ?string $status = null,
        public readonly ?string $subtotal = null,
        public readonly ?string $tax = null,
        public readonly ?string $total = null,
        public readonly ?string $uuid = null,
        public readonly ?int $version = null,
    ) {
    }
}
