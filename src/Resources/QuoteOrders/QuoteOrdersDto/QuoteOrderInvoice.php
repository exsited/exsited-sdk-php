<?php

declare(strict_types=1);

namespace Exsited\Resources\QuoteOrders\QuoteOrdersDto;

use Exsited\Client\Dto;

/** One entry of a `QuoteOrderInvoiceList`'s `data`. */
final class QuoteOrderInvoice extends Dto
{
    public function __construct(
        public readonly ?QuoteOrderInvoiceAccount $account = null,
        public readonly ?string $alternateBillingEndDate = null,
        public readonly ?string $alternateBillingStartDate = null,
        public readonly ?string $alternateDueDate = null,
        public readonly ?string $alternateIssueDate = null,
        public readonly ?string $billingEndDate = null,
        public readonly ?string $billingStartDate = null,
        public readonly ?QuoteOrderInvoiceCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?QuoteOrderInvoiceCurrency $currency = null,
        public readonly ?QuoteOrderInvoiceCustomForm $customForm = null,
        /** Untyped. */
        public readonly mixed $customerPurchaseOrderId = null,
        public readonly ?float $discountAmount = null,
        public readonly ?string $due = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $id = null,
        /** Untyped. */
        public readonly mixed $invoiceNote = null,
        public readonly ?string $issueDate = null,
        /** Untyped. */
        public readonly mixed $lastPayment = null,
        /** Untyped. */
        public readonly mixed $lastUpdatedBy = null,
        /** Untyped. */
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?QuoteOrderInvoiceOrder $order = null,
        /** Untyped. */
        public readonly mixed $origin = null,
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
