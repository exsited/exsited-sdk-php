<?php

declare(strict_types=1);

namespace Exsited\Resources\DocumentTemplates;

final class DocumentTemplatesUrls
{
    public const SETTINGS_DOCUMENT_TEMPLATES = '/api/{api_version}/settings/document_templates';
    public const SETTINGS_DOCUMENT_TEMPLATE = '/api/{api_version}/settings/document_templates/{document_template_id}';

    /** The key the `SETTINGS_DOCUMENT_TEMPLATES` listing's records sit under. */
    public const SETTINGS_DOCUMENT_TEMPLATES_KEY = 'data';

    /** The envelope one `document_template` record arrives under. */
    public const DOCUMENT_TEMPLATE_KEY = 'document_template';
}
