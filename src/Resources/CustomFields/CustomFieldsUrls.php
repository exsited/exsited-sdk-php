<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomFields;

final class CustomFieldsUrls
{
    public const SETTINGS_CUSTOM_FIELDS = '/api/{api_version}/settings/custom_fields';
    public const SETTINGS_CUSTOM_FIELD = '/api/{api_version}/settings/custom_fields/{custom_field_id}';

    /** The key the `SETTINGS_CUSTOM_FIELDS` listing's records sit under. */
    public const SETTINGS_CUSTOM_FIELDS_KEY = 'data';

    /** The envelope one `custom_field` record arrives under. */
    public const CUSTOM_FIELD_KEY = 'custom_field';
}
