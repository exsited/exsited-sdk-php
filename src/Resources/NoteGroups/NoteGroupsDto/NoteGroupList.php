<?php

declare(strict_types=1);

namespace Exsited\Resources\NoteGroups\NoteGroupsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** A page of NoteGroup records under `data`; an unreadable entry is null and keeps its place. */
final class NoteGroupList extends Dto
{
    /** The endpoints this page view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/note_groups',
    ];

    /** @param list<NoteGroup|null>|null $data */
    public function __construct(
        #[ListOf(NoteGroup::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
