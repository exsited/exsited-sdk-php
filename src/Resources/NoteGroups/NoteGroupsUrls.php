<?php

declare(strict_types=1);

namespace Exsited\Resources\NoteGroups;

final class NoteGroupsUrls
{
    public const NOTE_GROUPS = '/api/{api_version}/note_groups';
    public const NOTE_GROUP = '/api/{api_version}/note_groups/{note_group_id}';
    public const NOTE_GROUP_NOTES = '/api/{api_version}/note_groups/{note_group_id}/notes';
    public const NOTE_GROUP_NOTES_BY_USER = '/api/{api_version}/note_groups/{note_group_id}/notes/user/{note_user}';

    /** The key the `NOTE_GROUPS` listing's records sit under. */
    public const NOTE_GROUPS_KEY = 'data';

    /** The key the `NOTE_GROUP_NOTES` listing's records sit under. */
    public const NOTE_GROUP_NOTES_KEY = 'data';

    /** The envelope one `note_group` record arrives under. */
    public const NOTE_GROUP_KEY = 'note_group';

    /** The key the `NOTE_GROUP_NOTES_BY_USER` listing's records sit under. */
    public const NOTE_GROUP_NOTES_BY_USER_KEY = 'data';
}
