<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items\ItemsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** A page of ItemNoteFilesData records under `data`; an unreadable entry is null and keeps its place. */
final class ItemNoteFiles extends Dto
{
    /** The endpoints this page view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/items/{item_id}/notes/{item_note_id}/files',
    ];

    /** @param list<ItemNoteFilesData|null>|null $data */
    public function __construct(
        #[ListOf(ItemNoteFilesData::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
