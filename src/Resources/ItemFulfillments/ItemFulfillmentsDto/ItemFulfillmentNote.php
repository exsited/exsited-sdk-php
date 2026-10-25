<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ItemFulfillments\ItemFulfillmentsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One fulfillment note as the notes listing and read answer it; the note is stored on the
 *  fulfillment's sale invoice. */
final class ItemFulfillmentNote extends Dto
{
    /** @param list<ItemFulfillmentNoteAttachment|null>|null $attachments
     *  @param list<ItemFulfillmentNoteWatcher|null>|null $watchers */
    public function __construct(
        #[ListOf(ItemFulfillmentNoteAttachment::class)]
        public readonly ?array $attachments = null,
        public readonly ?string $content = null,
        public readonly ?ItemFulfillmentCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?ItemFulfillmentNotesDetail $itemFulfillment = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $object = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $user = null,
        public readonly ?int $version = null,
        #[ListOf(ItemFulfillmentNoteWatcher::class)]
        public readonly ?array $watchers = null,
    ) {
    }
}
