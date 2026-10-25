<?php

declare(strict_types=1);

namespace Exsited\Resources\Uom;

final class UomUrls
{
    public const SETTINGS_UOMS = '/api/{api_version}/settings/uom';
    public const SETTINGS_UOM = '/api/{api_version}/settings/uom/{uom_id}';

    /** The key the `SETTINGS_UOMS` listing's records sit under. */
    public const SETTINGS_UOMS_KEY = 'data';

    /** The envelope one `uom` record arrives under. */
    public const UOM_KEY = 'uom';
}
