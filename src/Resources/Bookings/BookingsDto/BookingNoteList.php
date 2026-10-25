<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Bookings\BookingsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One page of every order's notes, under `data`. */
final class BookingNoteList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/booking/notes',
    ];

    /** @param list<BookingNote|null>|null $data */
    public function __construct(
        #[ListOf(BookingNote::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
