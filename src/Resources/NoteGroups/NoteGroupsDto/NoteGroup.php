<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\NoteGroups\NoteGroupsDto;

use Exsited\Sdk\Client\Dto;

/** The NoteGroup body, as measured from the endpoints in MEASURED_FROM. */
final class NoteGroup extends Dto
{
    public const ENVELOPE_KEY = 'note_group';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/note_groups',
        'POST /api/{api_version}/note_groups',
        'GET /api/{api_version}/note_groups/{note_group_id}',
        'PATCH /api/{api_version}/note_groups/{note_group_id}',
    ];

    public function __construct(
        public readonly ?array $activityLogs = null,
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
