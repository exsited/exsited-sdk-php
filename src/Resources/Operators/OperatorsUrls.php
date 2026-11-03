<?php

declare(strict_types=1);

namespace Exsited\Resources\Operators;

final class OperatorsUrls
{
    public const SETTINGS_OPERATORS = '/api/{api_version}/settings/operators';
    public const SETTINGS_OPERATOR = '/api/{api_version}/settings/operators/{operator_id}';

    /** The key the `SETTINGS_OPERATORS` listing's records sit under. */
    public const SETTINGS_OPERATORS_KEY = 'data';

    /** The envelope one `operator` record arrives under. */
    public const OPERATOR_KEY = 'operator';
}
