<?php

declare(strict_types=1);

namespace Exsited\Resources\Countries;

use Exsited\Client\ApiResponse;
use Exsited\Client\Dto;
use Exsited\Client\ExsitedClient;
use Exsited\Errors\SdkUsageError;
use Exsited\Resources\Countries\CountriesDto\SettingsCountry;
use Exsited\Resources\Countries\CountriesDto\SettingsCountryList;

/** Country endpoints, under `/api/{api_version}/settings/countries`. */
final class Countries
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List the countries - `GET /settings/countries`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsCountries(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CountriesUrls::SETTINGS_COUNTRIES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsCountryList::class);
    }

    /** Read one country by its `country_` id - `GET /settings/countries/{country_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsCountry(ExsitedClient $client, int|string $countryId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CountriesUrls::SETTINGS_COUNTRY, pathParams: ['country_id' => $countryId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsCountry::class);
    }

    /** Update a country's status, description or `default_*` fields; the answer is the country as
     *  it was before the write - `PATCH /settings/countries/{country_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsCountry(ExsitedClient $client, int|string $countryId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(CountriesUrls::SETTINGS_COUNTRY, pathParams: ['country_id' => $countryId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsCountry::class);
    }

    private static function requirePayload(array|string|Dto $payload): void
    {
        if ($payload === [] || (is_string($payload) && trim($payload) === '')) {
            throw new SdkUsageError(
                'payload is required: this endpoint takes a body, and an empty one '
                . 'sends the request with nothing in it'
            );
        }
    }
}
