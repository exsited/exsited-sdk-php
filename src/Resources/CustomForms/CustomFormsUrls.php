<?php

declare(strict_types=1);

namespace Exsited\Resources\CustomForms;

final class CustomFormsUrls
{
    public const SETTINGS_CUSTOM_FORMS = '/api/{api_version}/settings/custom_forms';
    public const SETTINGS_CUSTOM_FORM = '/api/{api_version}/settings/custom_forms/{custom_form_id}';

    /** The key the `SETTINGS_CUSTOM_FORMS` listing's records sit under. */
    public const SETTINGS_CUSTOM_FORMS_KEY = 'data';

    /** The envelope one `custom_form` record arrives under. */
    public const CUSTOM_FORM_KEY = 'custom_form';
}
