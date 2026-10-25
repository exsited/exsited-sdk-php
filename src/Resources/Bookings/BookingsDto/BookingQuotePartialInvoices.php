<?php

declare(strict_types=1);

namespace Exsited\Resources\Bookings\BookingsDto;

use Exsited\Client\Dto;

/** What `getBookingQuotePartialInvoices` answers, under `order`. */
final class BookingQuotePartialInvoices extends Dto
{
    public const ENVELOPE_KEY = 'order';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/booking/{booking_id}/quote_partial_invoices',
    ];

    public function __construct(
        public readonly ?array $partialInvoices = null,
    ) {
    }
}
