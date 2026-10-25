<?php

declare(strict_types=1);

namespace Exsited\Resources\InvoiceTerms;

final class InvoiceTermsUrls
{
    public const SETTINGS_INVOICE_TERMS = '/api/{api_version}/settings/invoice_terms';
    public const SETTINGS_INVOICE_TERM = '/api/{api_version}/settings/invoice_terms/{invoice_term_id}';

    /** The key the `SETTINGS_INVOICE_TERMS` listing's records sit under. */
    public const SETTINGS_INVOICE_TERMS_KEY = 'data';

    /** The envelope one `invoice_term` record arrives under. */
    public const INVOICE_TERM_KEY = 'invoice_term';
}
