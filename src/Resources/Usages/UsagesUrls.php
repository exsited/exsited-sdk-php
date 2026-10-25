<?php

declare(strict_types=1);

namespace Exsited\Resources\Usages;

final class UsagesUrls
{
    public const USAGES = '/api/{api_version}/usages';
    public const USAGE = '/api/{api_version}/usages/{usage_id}';

    /** The key the `USAGES` listing's records sit under. */
    public const USAGES_KEY = 'data';

    /** The envelope one `usage` record arrives under. */
    public const USAGE_KEY = 'usage';
}
