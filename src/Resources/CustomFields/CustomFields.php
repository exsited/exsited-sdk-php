<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomFields;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Resources\CustomFields\CustomFieldsDto\SettingsCustomField;
use Exsited\Sdk\Resources\CustomFields\CustomFieldsDto\SettingsCustomFieldList;

/** Custom field endpoints, under `/api/{api_version}/settings/custom_fields`. */
final class CustomFields
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List the custom fields - `GET /settings/custom_fields`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsCustomFields(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CustomFieldsUrls::SETTINGS_CUSTOM_FIELDS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsCustomFieldList::class);
    }

    /** Read one custom field by its `cfld_` id - `GET /settings/custom_fields/{custom_field_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsCustomField(ExsitedClient $client, int|string $customFieldId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CustomFieldsUrls::SETTINGS_CUSTOM_FIELD, pathParams: ['custom_field_id' => $customFieldId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsCustomField::class);
    }
}
