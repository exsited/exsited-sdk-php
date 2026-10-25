<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Bookings\BookingsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One entry of a `BookingPaymentList`'s `data`. */
final class BookingPayment extends Dto
{
    /** @param list<BookingPaymentInvoice|null>|null $invoices
     *  @param list<BookingPaymentPaymentApplied|null>|null $paymentApplied */
    public function __construct(
        public readonly ?BookingPaymentAccount $account = null,
        public readonly ?BookingPaymentCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?array $creditApplied = null,
        public readonly ?array $giftCertificateApplied = null,
        public readonly ?string $id = null,
        #[ListOf(BookingPaymentInvoice::class)]
        public readonly ?array $invoices = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $object = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $origin = null,
        #[ListOf(BookingPaymentPaymentApplied::class)]
        public readonly ?array $paymentApplied = null,
        public readonly ?string $paymentNote = null,
        public readonly ?string $reconcileStatus = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
