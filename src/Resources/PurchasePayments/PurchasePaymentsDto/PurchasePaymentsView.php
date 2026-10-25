<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchasePayments\PurchasePaymentsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The PurchasePaymentsView body, as measured from the endpoints in MEASURED_FROM. */
final class PurchasePaymentsView extends Dto
{
    public const ENVELOPE_KEY = 'purchase_payment';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/purchase_invoices/{purchase_invoice_id}/purchase_payments',
        'POST /api/{api_version}/purchase_payments',
    ];

    /** @param list<PurchasePaymentsViewPaymentMethodApplication|null>|null $paymentMethodApplications
     *  @param list<PurchasePaymentsViewCreditNoteApplication|null>|null $creditNoteApplications
     *  @param list<PurchasePaymentsViewPurchaseInvoiceApplication|null>|null $purchaseInvoiceApplications
     *  @param list<PurchasePaymentsViewActivityLog|null>|null $activityLogs */
    public function __construct(
        public readonly ?PurchasePaymentsViewAccount $account = null,
        #[ListOf(PurchasePaymentsViewActivityLog::class)]
        public readonly ?array $activityLogs = null,
        public readonly ?string $code = null,
        public readonly ?PurchasePaymentsViewCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        #[ListOf(PurchasePaymentsViewCreditNoteApplication::class)]
        public readonly ?array $creditNoteApplications = null,
        public readonly ?string $creditNoteTotal = null,
        public readonly ?PurchasePaymentsViewCurrency $currency = null,
        public readonly ?array $customAttributes = null,
        public readonly ?array $customObjects = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?string $origin = null,
        public readonly ?string $paidTotal = null,
        public readonly ?string $paymentDate = null,
        #[ListOf(PurchasePaymentsViewPaymentMethodApplication::class)]
        public readonly ?array $paymentMethodApplications = null,
        public readonly ?string $paymentNote = null,
        public readonly mixed $paymentReference = null,
        public readonly ?array $purchaseCreditApplied = null,
        #[ListOf(PurchasePaymentsViewPurchaseInvoiceApplication::class)]
        public readonly ?array $purchaseInvoiceApplications = null,
        public readonly ?array $purchaseInvoices = null,
        public readonly ?string $purchaseOrderId = null,
        public readonly ?array $purchasePaymentApplied = null,
        public readonly ?string $purchasePaymentDate = null,
        public readonly ?string $purchasePaymentNote = null,
        public readonly ?string $status = null,
        public readonly ?string $totalApplied = null,
        public readonly ?string $uuid = null,
        public readonly ?int $version = null,
    ) {
    }
}
