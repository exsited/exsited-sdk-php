<?php

declare(strict_types=1);

namespace Exsited\Resources\CustomComponents\CustomComponentsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** A note's files, under `data`; its `pagination` carries `has_more` alone. */
final class ComponentObjectNoteFiles extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/components/{component_uuid}/objects/{component_object_id}/notes/{note_id}/files',
    ];

    /** @param list<ComponentObjectNoteAttachment|null>|null $data */
    public function __construct(
        #[ListOf(ComponentObjectNoteAttachment::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
