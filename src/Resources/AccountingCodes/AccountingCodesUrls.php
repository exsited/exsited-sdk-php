<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\AccountingCodes;

final class AccountingCodesUrls
{
    public const SETTINGS_ACCOUNTING_CODES = '/api/{api_version}/settings/accounting_codes';
    public const SETTINGS_ACCOUNTING_CODE = '/api/{api_version}/settings/accounting_codes/{accounting_code_id}';

    /** The key the `SETTINGS_ACCOUNTING_CODES` listing's records sit under. */
    public const SETTINGS_ACCOUNTING_CODES_KEY = 'data';

    /** The envelope one `accounting_code` record arrives under. */
    public const ACCOUNTING_CODE_KEY = 'accounting_code';
}
