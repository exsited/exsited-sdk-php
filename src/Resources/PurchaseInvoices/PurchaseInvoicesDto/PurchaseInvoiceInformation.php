<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The PurchaseInvoiceInformation body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseInvoiceInformation extends Dto
{
    public const ENVELOPE_KEY = 'purchase_invoice';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'PATCH /api/{api_version}/purchase_invoices/{purchase_invoice_id}/information',
    ];

    /** @param list<PurchaseInvoiceInformationLine|null>|null $lines */
    public function __construct(
        public readonly ?PurchaseInvoiceInformationAccount $account = null,
        public readonly ?array $activityLogs = null,
        public readonly ?string $alternateDueDate = null,
        public readonly ?string $alternateIssueDate = null,
        public readonly ?PurchaseInvoiceInformationCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?PurchaseInvoiceInformationCurrency $currency = null,
        public readonly ?array $customAttributes = null,
        public readonly mixed $customForm = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $id = null,
        public readonly ?string $invoiceNote = null,
        public readonly ?string $issueDate = null,
        public readonly ?PurchaseInvoiceInformationKpis $kpis = null,
        public readonly ?PurchaseInvoiceInformationLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        #[ListOf(PurchaseInvoiceInformationLine::class)]
        public readonly ?array $lines = null,
        public readonly ?string $object = null,
        public readonly ?string $origin = null,
        public readonly ?string $paymentStatus = null,
        public readonly ?bool $priceTaxInclusive = null,
        public readonly mixed $purchaseOrder = null,
        public readonly ?string $status = null,
        public readonly ?string $subtotal = null,
        public readonly ?string $tax = null,
        public readonly ?string $total = null,
        public readonly ?string $uuid = null,
        public readonly ?int $version = null,
    ) {
    }
}
