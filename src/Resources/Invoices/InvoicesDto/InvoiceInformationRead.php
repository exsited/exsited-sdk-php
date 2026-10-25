<?php

declare(strict_types=1);

namespace Exsited\Resources\Invoices\InvoicesDto;

use Exsited\Client\Dto;

/** The InvoiceInformationRead body, as measured from the endpoints in MEASURED_FROM. */
final class InvoiceInformationRead extends Dto
{
    public const ENVELOPE_KEY = 'invoice';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/invoices/{invoice_id}/information',
    ];

    public function __construct(
        public readonly ?InvoiceInformationReadAccount $account = null,
        public readonly ?string $alternateBillingEndDate = null,
        public readonly ?string $alternateBillingStartDate = null,
        public readonly ?string $alternateDueDate = null,
        public readonly ?string $alternateIssueDate = null,
        public readonly ?string $billingEndDate = null,
        public readonly ?string $billingStartDate = null,
        public readonly ?InvoiceInformationReadCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?InvoiceInformationReadCurrency $currency = null,
        public readonly ?array $customAttributes = null,
        public readonly ?InvoiceInformationReadCustomForm $customForm = null,
        public readonly ?string $customerPurchaseOrderId = null,
        public readonly ?float $discountAmount = null,
        public readonly ?string $due = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $id = null,
        public readonly ?string $invoiceNote = null,
        public readonly ?string $issueDate = null,
        public readonly ?InvoiceInformationReadLastPayment $lastPayment = null,
        public readonly ?InvoiceInformationReadLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?InvoiceInformationReadOrder $order = null,
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
