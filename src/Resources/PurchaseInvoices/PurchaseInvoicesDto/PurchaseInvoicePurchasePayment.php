<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The PurchaseInvoicePurchasePayment body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseInvoicePurchasePayment extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_invoices/{purchase_invoice_id}/purchase_payments',
    ];

    /** @param list<PurchaseInvoicePurchasePaymentCreditNoteApplication|null>|null $creditNoteApplications
     *  @param list<PurchaseInvoicePurchasePaymentPaymentMethodApplication|null>|null $paymentMethodApplications
     *  @param list<PurchaseInvoicePurchasePaymentPurchaseInvoiceApplication|null>|null $purchaseInvoiceApplications */
    public function __construct(
        public readonly ?PurchaseInvoicePurchasePaymentAccount $account = null,
        public readonly ?string $code = null,
        public readonly ?PurchaseInvoicePurchasePaymentCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        #[ListOf(PurchaseInvoicePurchasePaymentCreditNoteApplication::class)]
        public readonly ?array $creditNoteApplications = null,
        public readonly ?string $creditNoteTotal = null,
        public readonly ?PurchaseInvoicePurchasePaymentCurrency $currency = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?PurchaseInvoicePurchasePaymentLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?string $origin = null,
        public readonly ?string $paidTotal = null,
        public readonly ?string $paymentDate = null,
        #[ListOf(PurchaseInvoicePurchasePaymentPaymentMethodApplication::class)]
        public readonly ?array $paymentMethodApplications = null,
        public readonly ?string $paymentNote = null,
        public readonly mixed $paymentReference = null,
        #[ListOf(PurchaseInvoicePurchasePaymentPurchaseInvoiceApplication::class)]
        public readonly ?array $purchaseInvoiceApplications = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
