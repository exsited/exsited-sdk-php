<?php

declare(strict_types=1);

namespace Exsited\Resources\Bookings\BookingsDto;

use Exsited\Client\Dto;

/** What `getBookingBillingPreferences` answers, under `order`. */
final class BookingBillingPreferencesView extends Dto
{
    public const ENVELOPE_KEY = 'order';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/booking/{booking_id}/billing_preferences',
    ];

    public function __construct(
        public readonly ?BookingBillingPreferencesDetail $billingPreferences = null,
        public readonly ?string $object = null,
    ) {
    }
}
