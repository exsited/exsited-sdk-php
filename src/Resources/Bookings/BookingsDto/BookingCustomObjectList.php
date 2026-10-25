<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Bookings\BookingsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One page of the custom objects orders use, under `data`. */
final class BookingCustomObjectList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/booking/{booking_id}/custom_objects',
        'GET /api/{api_version}/booking/{booking_id}/custom_objects_instances',
    ];

    /** @param list<BookingCustomObjectEntry|null>|null $data */
    public function __construct(
        #[ListOf(BookingCustomObjectEntry::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
