<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Invoices\InvoicesDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The InvoiceReactivate body, as measured from the endpoints in MEASURED_FROM. */
final class InvoiceReactivate extends Dto
{
    public const ENVELOPE_KEY = 'invoice';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/invoices/{invoice_id}/reactivate',
    ];

    /** @param list<InvoiceReactivateLine|null>|null $lines */
    public function __construct(
        public readonly ?InvoiceReactivateAccount $account = null,
        public readonly ?string $accountId = null,
        public readonly ?array $activityLogs = null,
        public readonly ?string $alternateBillingEndDate = null,
        public readonly ?string $alternateBillingStartDate = null,
        public readonly ?string $alternateDueDate = null,
        public readonly ?string $alternateIssueDate = null,
        public readonly ?string $billingEndDate = null,
        public readonly ?string $billingStartDate = null,
        public readonly ?InvoiceReactivateCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?InvoiceReactivateCurrency $currency = null,
        public readonly ?array $customAttributes = null,
        public readonly ?InvoiceReactivateCustomForm $customForm = null,
        public readonly ?array $customObjects = null,
        public readonly ?string $customerPurchaseOrderId = null,
        public readonly ?float $discountAmount = null,
        public readonly ?string $due = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $id = null,
        public readonly ?string $invoiceNote = null,
        public readonly ?string $issueDate = null,
        public readonly mixed $kpis = null,
        public readonly mixed $lastPayment = null,
        public readonly ?InvoiceReactivateLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        #[ListOf(InvoiceReactivateLine::class)]
        public readonly ?array $lines = null,
        public readonly ?string $object = null,
        public readonly mixed $order = null,
        public readonly ?string $orderId = null,
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
        public readonly ?string $uuid = null,
        public readonly ?int $version = null,
    ) {
    }
}
