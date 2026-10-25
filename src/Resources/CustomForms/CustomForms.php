<?php

declare(strict_types=1);

namespace Exsited\Resources\CustomForms;

use Exsited\Client\ApiResponse;
use Exsited\Client\Dto;
use Exsited\Client\ExsitedClient;
use Exsited\Errors\SdkUsageError;
use Exsited\Resources\CustomForms\CustomFormsDto\SettingsCustomForm;
use Exsited\Resources\CustomForms\CustomFormsDto\SettingsCustomFormList;

/** Custom form endpoints, under `/api/{api_version}/settings/custom_forms`. */
final class CustomForms
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List the custom forms - `GET /settings/custom_forms`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsCustomForms(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CustomFormsUrls::SETTINGS_CUSTOM_FORMS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsCustomFormList::class);
    }

    /** Create a custom form; `name` and `setting_group`, a setting group name such as `ACCOUNT`,
     *  are required - `POST /settings/custom_forms`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsCustomForm(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(CustomFormsUrls::SETTINGS_CUSTOM_FORMS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsCustomForm::class);
    }

    /** Read one custom form by its `cf_` id - `GET /settings/custom_forms/{custom_form_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsCustomForm(ExsitedClient $client, int|string $customFormId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CustomFormsUrls::SETTINGS_CUSTOM_FORM, pathParams: ['custom_form_id' => $customFormId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsCustomForm::class);
    }

    /** Delete a custom form that is not system generated - `DELETE
     *  /settings/custom_forms/{custom_form_id}`. */
    public static function deleteSettingsCustomForm(ExsitedClient $client, int|string $customFormId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(CustomFormsUrls::SETTINGS_CUSTOM_FORM, pathParams: ['custom_form_id' => $customFormId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update a custom form's name, display name, description or users - `PATCH
     *  /settings/custom_forms/{custom_form_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsCustomForm(ExsitedClient $client, int|string $customFormId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(CustomFormsUrls::SETTINGS_CUSTOM_FORM, pathParams: ['custom_form_id' => $customFormId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsCustomForm::class);
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
