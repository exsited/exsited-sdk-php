<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The ItemNote body, as measured from the endpoints in MEASURED_FROM. */
final class ItemNote extends Dto
{
    public const ENVELOPE_KEY = 'note';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/items/{item_id}/notes',
        'POST /api/{api_version}/items/{item_id}/notes',
        'GET /api/{api_version}/items/{item_id}/notes/{item_note_id}',
        'PATCH /api/{api_version}/items/{item_id}/notes/{item_note_id}',
    ];

    /** @param list<ItemNoteAttachment|null>|null $attachments
     *  @param list<ItemNoteWatcher|null>|null $watchers */
    public function __construct(
        #[ListOf(ItemNoteAttachment::class)]
        public readonly ?array $attachments = null,
        public readonly ?string $content = null,
        public readonly ?ItemNoteCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?ItemNoteItem $item = null,
        public readonly ?ItemNoteLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly mixed $user = null,
        public readonly ?int $version = null,
        #[ListOf(ItemNoteWatcher::class)]
        public readonly ?array $watchers = null,
    ) {
    }
}
