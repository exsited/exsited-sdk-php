<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The PurchaseOrderPurchasePayment body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseOrderPurchasePayment extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_orders/{purchase_order_id}/purchase_payments',
    ];

    /** @param list<PurchaseOrderPurchasePaymentCreditNoteApplication|null>|null $creditNoteApplications
     *  @param list<PurchaseOrderPurchasePaymentPaymentMethodApplication|null>|null $paymentMethodApplications
     *  @param list<PurchaseOrderPurchasePaymentPurchaseInvoiceApplication|null>|null $purchaseInvoiceApplications */
    public function __construct(
        public readonly ?PurchaseOrderPurchasePaymentAccount $account = null,
        public readonly ?string $code = null,
        public readonly ?PurchaseOrderPurchasePaymentCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        #[ListOf(PurchaseOrderPurchasePaymentCreditNoteApplication::class)]
        public readonly ?array $creditNoteApplications = null,
        public readonly ?string $creditNoteTotal = null,
        public readonly ?PurchaseOrderPurchasePaymentCurrency $currency = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?PurchaseOrderPurchasePaymentLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?string $origin = null,
        public readonly ?string $paidTotal = null,
        public readonly ?string $paymentDate = null,
        #[ListOf(PurchaseOrderPurchasePaymentPaymentMethodApplication::class)]
        public readonly ?array $paymentMethodApplications = null,
        public readonly ?string $paymentNote = null,
        public readonly mixed $paymentReference = null,
        #[ListOf(PurchaseOrderPurchasePaymentPurchaseInvoiceApplication::class)]
        public readonly ?array $purchaseInvoiceApplications = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
