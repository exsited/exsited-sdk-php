<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Countries;

final class CountriesUrls
{
    public const SETTINGS_COUNTRIES = '/api/{api_version}/settings/countries';
    public const SETTINGS_COUNTRY = '/api/{api_version}/settings/countries/{country_id}';

    /** The key the `SETTINGS_COUNTRIES` listing's records sit under. */
    public const SETTINGS_COUNTRIES_KEY = 'data';

    /** The envelope one `country` record arrives under. */
    public const COUNTRY_KEY = 'country';
}
