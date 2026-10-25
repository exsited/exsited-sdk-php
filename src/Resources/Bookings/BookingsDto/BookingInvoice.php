<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Bookings\BookingsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of a `BookingInvoiceList`'s `data`. */
final class BookingInvoice extends Dto
{
    public function __construct(
        public readonly ?BookingInvoiceAccount $account = null,
        public readonly ?string $alternateBillingEndDate = null,
        public readonly ?string $alternateBillingStartDate = null,
        public readonly ?string $alternateDueDate = null,
        public readonly ?string $alternateIssueDate = null,
        public readonly ?string $billingEndDate = null,
        public readonly ?string $billingStartDate = null,
        public readonly ?BookingInvoiceCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?BookingInvoiceCurrency $currency = null,
        public readonly ?BookingInvoiceCustomForm $customForm = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $customerPurchaseOrderId = null,
        public readonly ?float $discountAmount = null,
        public readonly ?string $due = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $id = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $invoiceNote = null,
        public readonly ?string $issueDate = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastPayment = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?BookingInvoiceOrder $order = null,
        /** Null in every record measured, so untyped. */
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
