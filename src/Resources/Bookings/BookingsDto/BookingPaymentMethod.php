<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Bookings\BookingsDto;

use Exsited\Sdk\Client\Dto;

/** What `getBookingPaymentMethod` answers, under `order`. */
final class BookingPaymentMethod extends Dto
{
    public const ENVELOPE_KEY = 'order';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/booking/{booking_id}/payment_methods/{payment_method_ref}',
    ];

    public function __construct(
        public readonly ?BookingPaymentMethodPaymentMethod $paymentMethod = null,
    ) {
    }
}
