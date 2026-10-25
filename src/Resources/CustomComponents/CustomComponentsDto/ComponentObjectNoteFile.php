<?php

declare(strict_types=1);

namespace Exsited\Resources\CustomComponents\CustomComponentsDto;

use Exsited\Client\Dto;

/** One file of a note, under `file`. */
final class ComponentObjectNoteFile extends Dto
{
    public const ENVELOPE_KEY = 'file';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/components/{component_uuid}/objects/{component_object_id}/notes/{note_id}/files/{file_id}',
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
