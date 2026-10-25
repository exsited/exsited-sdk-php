<?php

declare(strict_types=1);

namespace Exsited\Resources\CustomComponents\CustomComponentsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** A component object's note, under `note`. */
final class ComponentObjectNote extends Dto
{
    public const ENVELOPE_KEY = 'note';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/components/{component_uuid}/objects/{component_object_id}/notes',
        'GET /api/{api_version}/components/{component_uuid}/objects/{component_object_id}/notes/{note_id}',
        'POST /api/{api_version}/components/{component_uuid}/objects/{component_object_id}/notes',
        'PATCH /api/{api_version}/components/{component_uuid}/objects/{component_object_id}/notes/{note_id}',
    ];

    /** @param list<ComponentObjectNoteAttachment|null>|null $attachments */
    public function __construct(
        #[ListOf(ComponentObjectNoteAttachment::class)]
        public readonly ?array $attachments = null,
        public readonly ?string $content = null,
        public readonly ?ComponentObjectNoteCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?ComponentObjectNoteCustomComponentObject $customComponentObject = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?ComponentObjectNoteLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $user = null,
        public readonly ?int $version = null,
        public readonly ?array $watchers = null,
    ) {
    }
}
