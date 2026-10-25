<?php

declare(strict_types=1);

namespace Exsited\Resources\Bookings\BookingsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One page of a booking's payments, under `data`. */
final class BookingPaymentList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/booking/{booking_id}/payments',
    ];

    /** @param list<BookingPayment|null>|null $data */
    public function __construct(
        #[ListOf(BookingPayment::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
