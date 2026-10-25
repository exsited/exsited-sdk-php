<?php

declare(strict_types=1);

namespace Exsited\Resources\Organisation;

use Exsited\Client\ApiResponse;
use Exsited\Client\ExsitedClient;
use Exsited\Resources\Organisation\OrganisationDto\SettingsOrganisation;

/** Root organisation endpoints, under `/api/{api_version}/settings/organisation`. */
final class Organisation
{
    /** Get the root organisation - `GET /settings/organisation`; read only, a PATCH here answers
     *  405.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsOrganisation(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(OrganisationUrls::SETTINGS_ORGANISATION, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsOrganisation::class);
    }
}
