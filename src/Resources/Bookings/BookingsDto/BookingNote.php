<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Bookings\BookingsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One entry of a `BookingNoteList`'s `data`. */
final class BookingNote extends Dto
{
    /** @param list<BookingNoteAttachment|null>|null $attachments
     *  @param list<BookingNoteWatcher|null>|null $watchers */
    public function __construct(
        #[ListOf(BookingNoteAttachment::class)]
        public readonly ?array $attachments = null,
        public readonly ?string $content = null,
        public readonly ?BookingNoteCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?BookingNoteLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $user = null,
        public readonly ?int $version = null,
        #[ListOf(BookingNoteWatcher::class)]
        public readonly ?array $watchers = null,
    ) {
    }
}
