<?php

declare(strict_types=1);

namespace Exsited\Resources\EmailTemplates;

final class EmailTemplatesUrls
{
    public const SETTINGS_EMAIL_TEMPLATES = '/api/{api_version}/settings/email_templates';
    public const SETTINGS_EMAIL_TEMPLATE = '/api/{api_version}/settings/email_templates/{email_template_id}';

    /** The key the `SETTINGS_EMAIL_TEMPLATES` listing's records sit under. */
    public const SETTINGS_EMAIL_TEMPLATES_KEY = 'data';

    /** The envelope one `email_template` record arrives under. */
    public const EMAIL_TEMPLATE_KEY = 'email_template';
}
