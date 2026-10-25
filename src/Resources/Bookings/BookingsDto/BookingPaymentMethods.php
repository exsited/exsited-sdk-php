<?php

declare(strict_types=1);

namespace Exsited\Resources\Bookings\BookingsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** What `getBookingPaymentMethods` answers, under `order`. */
final class BookingPaymentMethods extends Dto
{
    public const ENVELOPE_KEY = 'order';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/booking/{booking_id}/payment_methods',
    ];

    /** @param list<BookingPaymentMethodsPaymentMethod|null>|null $paymentMethods */
    public function __construct(
        #[ListOf(BookingPaymentMethodsPaymentMethod::class)]
        public readonly ?array $paymentMethods = null,
    ) {
    }
}
