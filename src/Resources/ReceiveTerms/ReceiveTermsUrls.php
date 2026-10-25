<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ReceiveTerms;

final class ReceiveTermsUrls
{
    public const SETTINGS_RECEIVE_TERMS = '/api/{api_version}/settings/receive_terms';
    public const SETTINGS_RECEIVE_TERM = '/api/{api_version}/settings/receive_terms/{receive_term_id}';

    /** The key the `SETTINGS_RECEIVE_TERMS` listing's records sit under. */
    public const SETTINGS_RECEIVE_TERMS_KEY = 'data';

    /** The envelope one `receive_term` record arrives under. */
    public const RECEIVE_TERM_KEY = 'receive_term';
}
