<?php

declare(strict_types=1);

namespace Exsited\Resources\CustomAttributes;

final class CustomAttributesUrls
{
    public const CUSTOM_ATTRIBUTES = '/api/{api_version}/custom_attributes';
    public const CUSTOM_ATTRIBUTE = '/api/{api_version}/custom_attributes/{custom_attribute_id}';

    /** The key the `CUSTOM_ATTRIBUTES` listing's records sit under. */
    public const CUSTOM_ATTRIBUTES_KEY = 'data';

    /** The envelope one `custom_attribute` record arrives under. */
    public const CUSTOM_ATTRIBUTE_KEY = 'custom_attribute';
}
