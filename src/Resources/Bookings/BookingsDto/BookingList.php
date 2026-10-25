<?php

declare(strict_types=1);

namespace Exsited\Resources\Bookings\BookingsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** A page of Booking records under `data`; an unreadable entry is null and keeps its place. */
final class BookingList extends Dto
{
    /** The endpoints this page view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/booking',
    ];

    /** @param list<Booking|null>|null $data */
    public function __construct(
        #[ListOf(Booking::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
