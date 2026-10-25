<?php

declare(strict_types=1);

namespace Exsited\Resources\Bookings\BookingsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** What `getBookingPayment` answers, under `payment`. */
final class BookingPaymentView extends Dto
{
    public const ENVELOPE_KEY = 'payment';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/booking/{booking_id}/payments/{payment_id}',
    ];

    /** @param list<BookingPaymentViewInvoice|null>|null $invoices
     *  @param list<BookingPaymentViewPaymentApplied|null>|null $paymentApplied */
    public function __construct(
        public readonly ?BookingPaymentViewAccount $account = null,
        public readonly ?BookingPaymentViewCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?array $creditApplied = null,
        public readonly ?array $customAttributes = null,
        public readonly ?array $giftCertificateApplied = null,
        public readonly ?string $id = null,
        #[ListOf(BookingPaymentViewInvoice::class)]
        public readonly ?array $invoices = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $object = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $origin = null,
        #[ListOf(BookingPaymentViewPaymentApplied::class)]
        public readonly ?array $paymentApplied = null,
        public readonly ?string $paymentNote = null,
        public readonly ?string $reconcileStatus = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
