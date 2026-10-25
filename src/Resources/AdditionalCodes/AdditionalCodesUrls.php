<?php

declare(strict_types=1);

namespace Exsited\Resources\AdditionalCodes;

final class AdditionalCodesUrls
{
    public const SETTINGS_ADDITIONAL_CODES = '/api/{api_version}/settings/additional_codes';
    public const SETTINGS_ADDITIONAL_CODE = '/api/{api_version}/settings/additional_codes/{additional_code_id}';

    /** The key the `SETTINGS_ADDITIONAL_CODES` listing's records sit under. */
    public const SETTINGS_ADDITIONAL_CODES_KEY = 'data';

    /** The envelope one `additional_code` record arrives under. */
    public const ADDITIONAL_CODE_KEY = 'additional_code';
}
