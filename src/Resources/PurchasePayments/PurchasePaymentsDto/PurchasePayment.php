<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchasePayments\PurchasePaymentsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The PurchasePayment body, as measured from the endpoints in MEASURED_FROM. */
final class PurchasePayment extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_payments',
    ];

    /** @param list<PurchasePaymentCreditNoteApplication|null>|null $creditNoteApplications
     *  @param list<PurchasePaymentPaymentMethodApplication|null>|null $paymentMethodApplications
     *  @param list<PurchasePaymentPurchaseInvoiceApplication|null>|null $purchaseInvoiceApplications */
    public function __construct(
        public readonly ?PurchasePaymentAccount $account = null,
        public readonly ?string $code = null,
        /** Untyped: no single type reads them all (string on 256, object on 2). */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        #[ListOf(PurchasePaymentCreditNoteApplication::class)]
        public readonly ?array $creditNoteApplications = null,
        public readonly ?string $creditNoteTotal = null,
        public readonly ?PurchasePaymentCurrency $currency = null,
        public readonly ?array $customAttributes = null,
        public readonly ?array $customObjects = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        /** Untyped: no single type reads them all (string on 256, object on 1). */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?string $origin = null,
        public readonly ?string $paidTotal = null,
        public readonly ?string $paymentDate = null,
        #[ListOf(PurchasePaymentPaymentMethodApplication::class)]
        public readonly ?array $paymentMethodApplications = null,
        public readonly ?string $paymentNote = null,
        public readonly mixed $paymentReference = null,
        public readonly ?array $purchaseCreditApplied = null,
        #[ListOf(PurchasePaymentPurchaseInvoiceApplication::class)]
        public readonly ?array $purchaseInvoiceApplications = null,
        public readonly ?array $purchaseInvoices = null,
        public readonly ?string $purchaseOrderId = null,
        public readonly ?array $purchasePaymentApplied = null,
        public readonly ?string $purchasePaymentDate = null,
        public readonly ?string $purchasePaymentNote = null,
        public readonly ?string $status = null,
        public readonly ?string $totalApplied = null,
        public readonly ?string $uuid = null,
        /** Untyped: no single type reads them all (string on 256, int on 2). */
        public readonly mixed $version = null,
    ) {
    }
}
