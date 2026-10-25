<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchasePayments\PurchasePaymentsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The PurchasePaymentRead body, as measured from the endpoints in MEASURED_FROM. */
final class PurchasePaymentRead extends Dto
{
    public const ENVELOPE_KEY = 'purchase_payment';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_invoices/{purchase_invoice_id}/purchase_payments',
        'GET /api/{api_version}/purchase_orders/{purchase_order_id}/purchase_payments',
        'GET /api/{api_version}/purchase_payments/{purchase_payment_id}',
    ];

    /** @param list<PurchasePaymentReadCreditNoteApplication|null>|null $creditNoteApplications
     *  @param list<PurchasePaymentReadPaymentMethodApplication|null>|null $paymentMethodApplications
     *  @param list<PurchasePaymentReadPurchaseInvoiceApplication|null>|null $purchaseInvoiceApplications */
    public function __construct(
        public readonly ?PurchasePaymentReadAccount $account = null,
        public readonly ?string $code = null,
        public readonly ?PurchasePaymentReadCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        #[ListOf(PurchasePaymentReadCreditNoteApplication::class)]
        public readonly ?array $creditNoteApplications = null,
        public readonly ?string $creditNoteTotal = null,
        public readonly ?PurchasePaymentReadCurrency $currency = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?PurchasePaymentReadLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?string $origin = null,
        public readonly ?string $paidTotal = null,
        public readonly ?string $paymentDate = null,
        #[ListOf(PurchasePaymentReadPaymentMethodApplication::class)]
        public readonly ?array $paymentMethodApplications = null,
        public readonly ?string $paymentNote = null,
        public readonly mixed $paymentReference = null,
        #[ListOf(PurchasePaymentReadPurchaseInvoiceApplication::class)]
        public readonly ?array $purchaseInvoiceApplications = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
