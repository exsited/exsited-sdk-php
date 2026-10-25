<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Salutations;

final class SalutationsUrls
{
    public const SETTINGS_SALUTATIONS = '/api/{api_version}/settings/salutations';
    public const SETTINGS_SALUTATION = '/api/{api_version}/settings/salutations/{salutation_id}';

    /** The key the `SETTINGS_SALUTATIONS` listing's records sit under. */
    public const SETTINGS_SALUTATIONS_KEY = 'data';

    /** The envelope one `salutation` record arrives under. */
    public const SALUTATION_KEY = 'salutation';
}
