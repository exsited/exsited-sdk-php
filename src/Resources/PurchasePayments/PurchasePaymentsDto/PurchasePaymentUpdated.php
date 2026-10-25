<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchasePayments\PurchasePaymentsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The PurchasePaymentUpdated body, as measured from the endpoints in MEASURED_FROM. */
final class PurchasePaymentUpdated extends Dto
{
    public const ENVELOPE_KEY = 'purchase_payment';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'PATCH /api/{api_version}/purchase_payments/{purchase_payment_id}',
    ];

    /** @param list<PurchasePaymentUpdatedPaymentMethodApplication|null>|null $paymentMethodApplications
     *  @param list<PurchasePaymentUpdatedPurchaseInvoiceApplication|null>|null $purchaseInvoiceApplications */
    public function __construct(
        public readonly ?PurchasePaymentUpdatedAccount $account = null,
        public readonly ?array $activityLogs = null,
        public readonly ?string $code = null,
        public readonly ?PurchasePaymentUpdatedCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?array $creditNoteApplications = null,
        public readonly ?string $creditNoteTotal = null,
        public readonly ?PurchasePaymentUpdatedCurrency $currency = null,
        public readonly ?array $customAttributes = null,
        public readonly ?array $customObjects = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?PurchasePaymentUpdatedLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?string $origin = null,
        public readonly ?string $paidTotal = null,
        public readonly ?string $paymentDate = null,
        #[ListOf(PurchasePaymentUpdatedPaymentMethodApplication::class)]
        public readonly ?array $paymentMethodApplications = null,
        public readonly ?string $paymentNote = null,
        public readonly mixed $paymentReference = null,
        public readonly ?array $purchaseCreditApplied = null,
        #[ListOf(PurchasePaymentUpdatedPurchaseInvoiceApplication::class)]
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
