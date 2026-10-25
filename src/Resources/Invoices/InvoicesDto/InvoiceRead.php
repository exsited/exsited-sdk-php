<?php

declare(strict_types=1);

namespace Exsited\Resources\Invoices\InvoicesDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The InvoiceRead body, as measured from the endpoints in MEASURED_FROM. */
final class InvoiceRead extends Dto
{
    public const ENVELOPE_KEY = 'invoice';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/invoices/{invoice_id}',
    ];

    /** @param list<InvoiceReadLine|null>|null $lines */
    public function __construct(
        public readonly ?InvoiceReadAccount $account = null,
        public readonly ?string $accountId = null,
        public readonly ?string $alternateBillingEndDate = null,
        public readonly ?string $alternateBillingStartDate = null,
        public readonly ?string $alternateDueDate = null,
        public readonly ?string $alternateIssueDate = null,
        public readonly ?string $billingEndDate = null,
        public readonly ?string $billingStartDate = null,
        /** Untyped: no single type reads them all (string on 2, object on 1). */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?InvoiceReadCurrency $currency = null,
        public readonly ?array $customAttributes = null,
        public readonly ?InvoiceReadCustomForm $customForm = null,
        public readonly ?array $customObjects = null,
        public readonly ?string $customerPurchaseOrderId = null,
        /** Untyped: no single type reads them all (string on 2, float on 1). */
        public readonly mixed $discountAmount = null,
        public readonly ?string $due = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $id = null,
        public readonly ?string $invoiceNote = null,
        public readonly ?string $issueDate = null,
        public readonly mixed $kpis = null,
        public readonly ?InvoiceReadLastPayment $lastPayment = null,
        /** Untyped: no single type reads them all (string on 2, object on 1). */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        #[ListOf(InvoiceReadLine::class)]
        public readonly ?array $lines = null,
        public readonly ?string $object = null,
        public readonly ?InvoiceReadOrder $order = null,
        public readonly ?string $orderId = null,
        public readonly ?string $origin = null,
        public readonly ?string $paid = null,
        public readonly ?string $paymentStatus = null,
        /** Untyped: no single type reads them all (string on 2, bool on 1). */
        public readonly mixed $priceTaxInclusive = null,
        public readonly ?string $status = null,
        public readonly ?string $subtotal = null,
        public readonly ?string $tax = null,
        public readonly ?string $taxTotal = null,
        public readonly ?string $total = null,
        public readonly ?string $type = null,
        public readonly ?string $uuid = null,
        /** Untyped: no single type reads them all (string on 2, int on 1). */
        public readonly mixed $version = null,
    ) {
    }
}
