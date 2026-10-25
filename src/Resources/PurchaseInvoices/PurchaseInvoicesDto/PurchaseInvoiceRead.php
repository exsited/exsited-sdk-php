<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The PurchaseInvoiceRead body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseInvoiceRead extends Dto
{
    public const ENVELOPE_KEY = 'purchase_invoice';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/purchase_invoices',
        'GET /api/{api_version}/purchase_invoices/{purchase_invoice_id}',
        'POST /api/{api_version}/purchase_invoices/{purchase_invoice_id}/amend',
        'POST /api/{api_version}/purchase_invoices/{purchase_invoice_id}/reactivate',
        'POST /api/{api_version}/purchase_orders/{purchase_order_id}/purchase_invoices',
    ];

    /** @param list<PurchaseInvoiceReadCustomAttribute|null>|null $customAttributes
     *  @param list<PurchaseInvoiceReadLine|null>|null $lines */
    public function __construct(
        public readonly ?PurchaseInvoiceReadAccount $account = null,
        public readonly ?array $activityLogs = null,
        public readonly ?string $alternateDueDate = null,
        public readonly ?string $alternateIssueDate = null,
        public readonly ?PurchaseInvoiceReadCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?PurchaseInvoiceReadCurrency $currency = null,
        #[ListOf(PurchaseInvoiceReadCustomAttribute::class)]
        public readonly ?array $customAttributes = null,
        public readonly mixed $customForm = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $id = null,
        public readonly ?string $issueDate = null,
        public readonly ?PurchaseInvoiceReadKpis $kpis = null,
        public readonly ?PurchaseInvoiceReadLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        #[ListOf(PurchaseInvoiceReadLine::class)]
        public readonly ?array $lines = null,
        public readonly ?string $object = null,
        public readonly ?string $origin = null,
        public readonly ?string $paymentStatus = null,
        public readonly ?bool $priceTaxInclusive = null,
        public readonly ?PurchaseInvoiceReadPurchaseOrder $purchaseOrder = null,
        public readonly ?string $status = null,
        public readonly ?string $subtotal = null,
        public readonly ?string $tax = null,
        public readonly ?string $total = null,
        public readonly ?string $uuid = null,
        public readonly ?int $version = null,
    ) {
    }
}
