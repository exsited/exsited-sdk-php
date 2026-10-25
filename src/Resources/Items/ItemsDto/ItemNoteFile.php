<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;

/** The ItemNoteFile body, as measured from the endpoints in MEASURED_FROM. */
final class ItemNoteFile extends Dto
{
    public const ENVELOPE_KEY = 'file';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/items/{item_id}/notes/{item_note_id}/files/{item_file_id}',
    ];

    public function __construct(
        public readonly ?string $contentType = null,
        public readonly ?string $filename = null,
        public readonly ?string $href = null,
        public readonly ?int $size = null,
        public readonly ?string $uuid = null,
    ) {
    }
}
