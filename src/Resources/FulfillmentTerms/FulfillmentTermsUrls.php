<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\FulfillmentTerms;

final class FulfillmentTermsUrls
{
    public const SETTINGS_FULFILLMENT_TERMS = '/api/{api_version}/settings/fulfillment_terms';
    public const SETTINGS_FULFILLMENT_TERM = '/api/{api_version}/settings/fulfillment_terms/{fulfillment_term_id}';

    /** The key the `SETTINGS_FULFILLMENT_TERMS` listing's records sit under. */
    public const SETTINGS_FULFILLMENT_TERMS_KEY = 'data';

    /** The envelope one `fulfillment_term` record arrives under. */
    public const FULFILLMENT_TERM_KEY = 'fulfillment_term';
}
