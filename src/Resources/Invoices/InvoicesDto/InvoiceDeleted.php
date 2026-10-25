<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Invoices\InvoicesDto;

use Exsited\Sdk\Client\Dto;

/** The InvoiceDeleted body, as measured from the endpoints in MEASURED_FROM. */
final class InvoiceDeleted extends Dto
{
    public const ENVELOPE_KEY = 'invoice';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'DELETE /api/{api_version}/invoices/{invoice_id}',
    ];

    public function __construct(
        public readonly ?string $accountId = null,
        public readonly ?string $alternateDueDate = null,
        public readonly ?string $alternateIssueDate = null,
        public readonly ?string $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $currency = null,
        public readonly ?array $customAttributes = null,
        public readonly mixed $customForm = null,
        public readonly ?array $customObjects = null,
        public readonly ?string $customerPurchaseOrderId = null,
        public readonly ?string $discountAmount = null,
        public readonly ?string $due = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $id = null,
        public readonly ?string $invoiceNote = null,
        public readonly ?string $issueDate = null,
        public readonly mixed $kpis = null,
        public readonly mixed $lastPayment = null,
        public readonly ?string $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?array $lines = null,
        public readonly ?string $orderId = null,
        public readonly ?string $origin = null,
        public readonly ?string $paid = null,
        public readonly ?string $paymentStatus = null,
        public readonly ?string $priceTaxInclusive = null,
        public readonly ?string $status = null,
        public readonly ?string $subtotal = null,
        public readonly ?string $tax = null,
        public readonly ?string $taxTotal = null,
        public readonly ?string $total = null,
        public readonly ?string $type = null,
        public readonly ?string $uuid = null,
        public readonly ?string $version = null,
    ) {
    }
}
