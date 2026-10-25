<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Invoices\InvoicesDto;

use Exsited\Sdk\Client\Dto;

/** The Invoice body, as measured from the endpoints in MEASURED_FROM. */
final class Invoice extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/invoices',
        'GET /api/{api_version}/orders/{order_id}/invoices',
    ];

    public function __construct(
        public readonly ?InvoiceAccount $account = null,
        public readonly ?string $alternateBillingEndDate = null,
        public readonly ?string $alternateBillingStartDate = null,
        public readonly ?string $alternateDueDate = null,
        public readonly ?string $alternateIssueDate = null,
        public readonly ?string $billingEndDate = null,
        public readonly ?string $billingStartDate = null,
        public readonly ?InvoiceCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?InvoiceCurrency $currency = null,
        public readonly ?InvoiceCustomForm $customForm = null,
        public readonly ?string $customerPurchaseOrderId = null,
        public readonly ?float $discountAmount = null,
        public readonly ?string $due = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $id = null,
        public readonly ?string $invoiceNote = null,
        public readonly ?string $issueDate = null,
        public readonly ?InvoiceLastPayment $lastPayment = null,
        public readonly ?InvoiceLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?InvoiceOrder $order = null,
        public readonly ?string $origin = null,
        public readonly ?string $paid = null,
        public readonly ?string $paymentStatus = null,
        public readonly ?bool $priceTaxInclusive = null,
        public readonly ?string $status = null,
        public readonly ?string $subtotal = null,
        public readonly ?string $tax = null,
        public readonly ?string $taxTotal = null,
        public readonly ?string $total = null,
        public readonly ?string $type = null,
        public readonly ?int $version = null,
    ) {
    }
}
