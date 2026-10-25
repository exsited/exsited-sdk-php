<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomComponents;

final class CustomComponentsUrls
{
    public const COMPONENT = '/api/{api_version}/component';
    public const COMPONENT_BY_UUID = '/api/{api_version}/component/{component_uuid}';
    public const COMPONENT_BY_ID = '/api/{api_version}/component/{component_uuid}/{component_object_id}';
    public const COMPONENT_OBJECTS = '/api/{api_version}/components/{component_uuid}/objects';
    public const COMPONENT_OBJECT = '/api/{api_version}/components/{component_uuid}/objects/{component_object_id}';
    public const COMPONENT_OBJECT_ACTIVITY = '/api/{api_version}/components/{component_uuid}/objects/{component_object_id}/activity';
    public const COMPONENT_OBJECT_CUSTOM_OBJECTS = '/api/{api_version}/components/{component_uuid}/objects/{component_object_id}/custom_objects';
    public const COMPONENT_OBJECT_PDF = '/api/{api_version}/components/{component_uuid}/objects/{component_object_id}/pdf';
    public const COMPONENT_OBJECT_ACTIVITY_ENTRY = '/api/{api_version}/components/{component_uuid}/objects/{component_object_id}/activity/{activity_id}';
    public const COMPONENT_OBJECT_MILESTONES = '/api/{api_version}/components/{component_uuid}/objects/{component_object_id}/milestones';
    public const COMPONENT_OBJECT_MILESTONE = '/api/{api_version}/components/{component_uuid}/objects/{component_object_id}/milestones/{milestone_id}';
    public const COMPONENT_OBJECT_HISTORY = '/api/{api_version}/components/{component_uuid}/objects/{component_object_id}/history';
    public const COMPONENT_OBJECT_HISTORY_ENTRY = '/api/{api_version}/components/{component_uuid}/objects/{component_object_id}/history/{history_id}';
    public const COMPONENT_OBJECT_NOTES = '/api/{api_version}/components/{component_uuid}/objects/{component_object_id}/notes';
    public const COMPONENT_OBJECT_NOTE = '/api/{api_version}/components/{component_uuid}/objects/{component_object_id}/notes/{note_id}';
    public const COMPONENT_OBJECT_NOTE_FILES = '/api/{api_version}/components/{component_uuid}/objects/{component_object_id}/notes/{note_id}/files';
    public const COMPONENT_OBJECT_NOTE_FILE = '/api/{api_version}/components/{component_uuid}/objects/{component_object_id}/notes/{note_id}/files/{file_id}';
    public const COMPONENT_OBJECT_CUSTOM_OBJECT = '/api/{api_version}/components/{component_uuid}/objects/{component_object_id}/custom_objects/{custom_object_id}';
    public const COMPONENT_OBJECT_CUSTOM_OBJECT_INSTANCE = '/api/{api_version}/components/{component_uuid}/objects/{component_object_id}/custom_objects/{custom_object_id}/instances/{instance_id}';
    public const COMPONENT_OBJECT_LINK_DOMAINS = '/api/{api_version}/components/{component_uuid}/objects/{component_object_id}/link_domains';
    public const COMPONENT_OBJECT_UNLINK_DOMAINS = '/api/{api_version}/components/{component_uuid}/objects/{component_object_id}/unlink_domains';
    public const COMPONENT_OBJECT_CHANGE_STATUS = '/api/{api_version}/components/{component_uuid}/objects/{component_object_id}/change_status';

    /** The key the `COMPONENT` listing's records sit under. */
    public const COMPONENT_LISTING_KEY = 'data';

    /** The key the `COMPONENT_OBJECTS` listing's records sit under. */
    public const COMPONENT_OBJECTS_KEY = 'data';

    /** The envelope one `Acc Cus Comp` record arrives under. */
    public const ACC_CUS_COMP_KEY = 'Acc Cus Comp';

    /** The envelope one `component` record arrives under. */
    public const COMPONENT_KEY = 'component';

    /** The key the `COMPONENT_OBJECT_NOTES` listing's records sit under. */
    public const COMPONENT_OBJECT_NOTES_KEY = 'data';

    /** The key the `COMPONENT_OBJECT_NOTE_FILES` listing's records sit under. */
    public const COMPONENT_OBJECT_NOTE_FILES_KEY = 'data';

    /** The envelope one `custom_component_object` record arrives under. */
    public const CUSTOM_COMPONENT_OBJECT_KEY = 'custom_component_object';

    /** The envelope one `custom_component_object_activity` record arrives under. */
    public const CUSTOM_COMPONENT_OBJECT_ACTIVITY_KEY = 'custom_component_object_activity';

    /** The envelope one `note` record arrives under. */
    public const NOTE_KEY = 'note';

    /** The envelope one `file` record arrives under. */
    public const FILE_KEY = 'file';
}
