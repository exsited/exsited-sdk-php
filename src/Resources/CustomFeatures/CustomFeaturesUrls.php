<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomFeatures;

final class CustomFeaturesUrls
{
    public const CUSTOM_FEATURE = '/api/{api_version}/custom_feature';
    public const COMPONENT_BY_ID = '/api/{api_version}/component/{custom_feature_id}';
    public const CUSTOM_FEATURE_BY_ID = '/api/{api_version}/custom_feature/{custom_feature_id}';

    /** The envelope one `component` record arrives under. */
    public const COMPONENT_KEY = 'component';

    /** The envelope one `custom_feature` record arrives under. */
    public const CUSTOM_FEATURE_KEY = 'custom_feature';
}
