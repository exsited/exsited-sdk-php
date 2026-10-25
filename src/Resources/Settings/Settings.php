<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings;

use Exsited\Client\ApiResponse;
use Exsited\Client\Dto;
use Exsited\Client\ExsitedClient;
use Exsited\Errors\SdkUsageError;
use Exsited\Resources\Settings\SettingsDto\CustomObjectList;
use Exsited\Resources\Settings\SettingsDto\SettingsCurrencyList;
use Exsited\Resources\Settings\SettingsDto\SettingsCurrencyRead;
use Exsited\Resources\Settings\SettingsDto\SettingsCustomLogicScript;
use Exsited\Resources\Settings\SettingsDto\SettingsCustomLogicScriptSaved;
use Exsited\Resources\Settings\SettingsDto\SettingsCustomLogicScripts;
use Exsited\Resources\Settings\SettingsDto\SettingsCustomObjectCustomize;
use Exsited\Resources\Settings\SettingsDto\SettingsCustomObjectDefinitionList;
use Exsited\Resources\Settings\SettingsDto\SettingsCustomObjectDefinitionRead;
use Exsited\Resources\Settings\SettingsDto\SettingsCustomObjects;
use Exsited\Resources\Settings\SettingsDto\SettingsDiscountProfileList;
use Exsited\Resources\Settings\SettingsDto\SettingsDiscountProfileRead;
use Exsited\Resources\Settings\SettingsDto\SettingsFieldSettingList;
use Exsited\Resources\Settings\SettingsDto\SettingsFieldSettingRead;
use Exsited\Resources\Settings\SettingsDto\SettingsFieldSettingsItem;
use Exsited\Resources\Settings\SettingsDto\SettingsGeneralSettings;
use Exsited\Resources\Settings\SettingsDto\SettingsGeneralSettingsItemUpdated;
use Exsited\Resources\Settings\SettingsDto\SettingsItemGroupList;
use Exsited\Resources\Settings\SettingsDto\SettingsItemGroups;
use Exsited\Resources\Settings\SettingsDto\SettingsPaymentProcessorList;
use Exsited\Resources\Settings\SettingsDto\SettingsPaymentProcessorRead;
use Exsited\Resources\Settings\SettingsDto\SettingsPaymentProcessorSaved;
use Exsited\Resources\Settings\SettingsDto\SettingsPaymentTermCreated;
use Exsited\Resources\Settings\SettingsDto\SettingsPaymentTermList;
use Exsited\Resources\Settings\SettingsDto\SettingsPaymentTermRead;
use Exsited\Resources\Settings\SettingsDto\SettingsPaymentTermUpdated;
use Exsited\Resources\Settings\SettingsDto\SettingsPricingLevelCreated;
use Exsited\Resources\Settings\SettingsDto\SettingsPricingLevelList;
use Exsited\Resources\Settings\SettingsDto\SettingsPricingLevelRead;
use Exsited\Resources\Settings\SettingsDto\SettingsShippingProfileList;
use Exsited\Resources\Settings\SettingsDto\SettingsShippingProfileRead;
use Exsited\Resources\Settings\SettingsDto\SettingsTaxList;
use Exsited\Resources\Settings\SettingsDto\SettingsTaxRead;
use Exsited\Resources\Settings\SettingsDto\SettingsTimeZoneList;
use Exsited\Resources\Settings\SettingsDto\SettingsTimeZoneRead;
use Exsited\Resources\Settings\SettingsDto\SettingsVariationList;
use Exsited\Resources\Settings\SettingsDto\SettingsVariations;
use Exsited\Resources\Settings\SettingsDto\SettingsView;
use Exsited\Resources\Settings\SettingsDto\SettingsWarehouseList;
use Exsited\Resources\Settings\SettingsDto\SettingsWarehouseRead;

/** Settings endpoints, under `/api/{api_version}`. */
final class Settings
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** Custom object definitions - `GET /custom_objects`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getCustomObjects(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::CUSTOM_OBJECTS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: CustomObjectList::class);
    }

    /** All settings - `GET /settings`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettings(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::SETTINGS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsView::class);
    }

    /** Single custom object definition - `GET /custom_objects/{custom_object_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getCustomObject(ExsitedClient $client, int|string $customObjectId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::CUSTOM_OBJECT, pathParams: ['custom_object_id' => $customObjectId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsCustomObjects::class);
    }

    /** List currencies - `GET /settings/currencies`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsCurrencies(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::SETTINGS_CURRENCIES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsCurrencyList::class);
    }

    /** List custom logic scripts - `GET /settings/custom_logic_scripts`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsCustomLogicScripts(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::SETTINGS_CUSTOM_LOGIC_SCRIPTS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsCustomLogicScripts::class);
    }

    /** Create custom object - `POST /settings/custom_objects`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsCustomObject(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(SettingsUrls::SETTINGS_CUSTOM_OBJECTS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsCustomObjects::class);
    }

    /** List discount profiles - `GET /settings/discount_profiles`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsDiscountProfiles(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::SETTINGS_DISCOUNT_PROFILES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsDiscountProfileList::class);
    }

    /** List item groups - `GET /settings/item_groups`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsItemGroups(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::SETTINGS_ITEM_GROUPS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsItemGroupList::class);
    }

    /** Create item group - `POST /settings/item_groups`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsItemGroup(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(SettingsUrls::SETTINGS_ITEM_GROUPS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsItemGroups::class);
    }

    /** List payment processors - `GET /settings/payment_processors`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsPaymentProcessors(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::SETTINGS_PAYMENT_PROCESSORS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsPaymentProcessorList::class);
    }

    /** List payment terms - `GET /settings/payment_terms`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsPaymentTerms(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::SETTINGS_PAYMENT_TERMS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsPaymentTermList::class);
    }

    /** List pricing levels - `GET /settings/pricing_levels`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsPricingLevels(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::SETTINGS_PRICING_LEVELS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsPricingLevelList::class);
    }

    /** List shipping profiles - `GET /settings/shipping_profiles`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsShippingProfiles(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::SETTINGS_SHIPPING_PROFILES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsShippingProfileList::class);
    }

    /** List taxes - `GET /settings/taxes`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsTaxes(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::SETTINGS_TAXES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsTaxList::class);
    }

    /** List time zones - `GET /settings/time_zones`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsTimeZones(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::SETTINGS_TIME_ZONES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsTimeZoneList::class);
    }

    /** List variations - `GET /settings/variations`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsVariations(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::SETTINGS_VARIATIONS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsVariationList::class);
    }

    /** Create variation - `POST /settings/variations`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsVariation(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(SettingsUrls::SETTINGS_VARIATIONS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsVariations::class);
    }

    /** List warehouses - `GET /settings/warehouses`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsWarehouses(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::SETTINGS_WAREHOUSES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsWarehouseList::class);
    }

    /** Get single - `GET /settings/currencies/{currency_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsCurrency(ExsitedClient $client, int|string $currencyId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::SETTINGS_CURRENCY, pathParams: ['currency_id' => $currencyId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsCurrencyRead::class);
    }

    /** Get single - `GET /settings/custom_logic_scripts/{custom_logic_script_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsCustomLogicScript(ExsitedClient $client, int|string $customLogicScriptId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::SETTINGS_CUSTOM_LOGIC_SCRIPT, pathParams: ['custom_logic_script_id' => $customLogicScriptId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsCustomLogicScript::class);
    }

    /** Delete custom object - `DELETE
     *  /settings/custom_objects/{custom_object_id}`. */
    public static function deleteSettingsCustomObject(ExsitedClient $client, int|string $customObjectId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(SettingsUrls::SETTINGS_CUSTOM_OBJECT, pathParams: ['custom_object_id' => $customObjectId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update custom object - `PATCH /settings/custom_objects/{custom_object_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsCustomObject(ExsitedClient $client, int|string $customObjectId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(SettingsUrls::SETTINGS_CUSTOM_OBJECT, pathParams: ['custom_object_id' => $customObjectId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsCustomObjects::class);
    }

    /** Update account field settings - `PATCH /settings/field_settings/account`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsFieldSettingsAccount(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(SettingsUrls::SETTINGS_FIELD_SETTINGS_ACCOUNT, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsFieldSettingsItem::class);
    }

    /** Update item field settings - `PATCH /settings/field_settings/item`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsFieldSettingsItem(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(SettingsUrls::SETTINGS_FIELD_SETTINGS_ITEM, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsFieldSettingsItem::class);
    }

    /** Update account general settings - `PATCH /settings/general_settings/account`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsGeneralSettingsAccount(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(SettingsUrls::SETTINGS_GENERAL_SETTINGS_ACCOUNT, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsFieldSettingsItem::class);
    }

    /** Update item general settings - `PATCH /settings/general_settings/item`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsGeneralSettingsItem(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(SettingsUrls::SETTINGS_GENERAL_SETTINGS_ITEM, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsGeneralSettingsItemUpdated::class);
    }

    /** Delete item group - `DELETE /settings/item_groups/{item_group_id}`. */
    public static function deleteSettingsItemGroup(ExsitedClient $client, int|string $itemGroupId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(SettingsUrls::SETTINGS_ITEM_GROUP, pathParams: ['item_group_id' => $itemGroupId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Get single - `GET /settings/item_groups/{item_group_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsItemGroup(ExsitedClient $client, int|string $itemGroupId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::SETTINGS_ITEM_GROUP, pathParams: ['item_group_id' => $itemGroupId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsItemGroups::class);
    }

    /** Update item group - `PATCH /settings/item_groups/{item_group_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsItemGroup(ExsitedClient $client, int|string $itemGroupId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(SettingsUrls::SETTINGS_ITEM_GROUP, pathParams: ['item_group_id' => $itemGroupId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsItemGroups::class);
    }

    /** Get single - `GET /settings/time_zones/{time_zone_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsTimeZone(ExsitedClient $client, int|string $timeZoneId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::SETTINGS_TIME_ZONE, pathParams: ['time_zone_id' => $timeZoneId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsTimeZoneRead::class);
    }

    /** Get single - `GET /settings/variations/{variation_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsVariation(ExsitedClient $client, int|string $variationId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::SETTINGS_VARIATION, pathParams: ['variation_id' => $variationId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsVariations::class);
    }

    /** Update variation - `PATCH /settings/variations/{variation_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsVariation(ExsitedClient $client, int|string $variationId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(SettingsUrls::SETTINGS_VARIATION, pathParams: ['variation_id' => $variationId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsVariations::class);
    }

    /** Customize attributes - `POST
     *  /settings/custom_objects/{custom_object_id}/customize`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsCustomObjectCustomize(ExsitedClient $client, int|string $customObjectId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(SettingsUrls::SETTINGS_CUSTOM_OBJECT_CUSTOMIZE, pathParams: ['custom_object_id' => $customObjectId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsCustomObjectCustomize::class);
    }

    /** Update billing preferences - `POST
     *  /settings/item_groups/{item_group_id}/billing_preferences`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsItemGroupBillingPreference(ExsitedClient $client, int|string $itemGroupId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(SettingsUrls::SETTINGS_ITEM_GROUP_BILLING_PREFERENCES, pathParams: ['item_group_id' => $itemGroupId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsItemGroups::class);
    }

    /** List custom object definitions - `GET /settings/custom_objects`; enabled definitions only.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsCustomObjects(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::SETTINGS_CUSTOM_OBJECTS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsCustomObjectDefinitionList::class);
    }

    /** Get one custom object definition - `GET /settings/custom_objects/{custom_object_id}`, under
     *  `custom_object`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsCustomObject(ExsitedClient $client, int|string $customObjectId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::SETTINGS_CUSTOM_OBJECT, pathParams: ['custom_object_id' => $customObjectId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsCustomObjectDefinitionRead::class);
    }

    /** Create a custom object schema - `POST /custom_objects`; answered `201`, under
     *  `custom_object`. `name` is required and must be unused.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createCustomObject(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(SettingsUrls::CUSTOM_OBJECTS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsCustomObjects::class);
    }

    /** Update a custom object schema - `PATCH /custom_objects/{custom_object_id}`, under
     *  `custom_object`. `use_in`, `relation` and `custom_component` are refused.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateCustomObject(ExsitedClient $client, int|string $customObjectId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(SettingsUrls::CUSTOM_OBJECT, pathParams: ['custom_object_id' => $customObjectId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsCustomObjects::class);
    }

    /** Delete a custom object schema - `DELETE /custom_objects/{custom_object_id}`; answered
     *  `204`. */
    public static function deleteCustomObject(ExsitedClient $client, int|string $customObjectId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(SettingsUrls::CUSTOM_OBJECT, pathParams: ['custom_object_id' => $customObjectId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Create a currency - `POST /settings/currencies`; answered `201`, under `currency`. `code`
     *  and `country` are required, and v4 has no route that deletes a currency.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsCurrency(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(SettingsUrls::SETTINGS_CURRENCIES, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update a currency - `PATCH /settings/currencies/{currency_id}`, under `currency`. Only
     *  `rounding`, `cash_rounding_interval`, `conversion_rate` and `status` are accepted.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsCurrency(ExsitedClient $client, int|string $currencyId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(SettingsUrls::SETTINGS_CURRENCY, pathParams: ['currency_id' => $currencyId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Create a custom logic script - `POST /settings/custom_logic_scripts`; answered `201`.
     *  `name`, `type` and `code` are required, and `code` is validated but not stored.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsCustomLogicScript(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(SettingsUrls::SETTINGS_CUSTOM_LOGIC_SCRIPTS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsCustomLogicScriptSaved::class);
    }

    /** Update a custom logic script - `PATCH
     *  /settings/custom_logic_scripts/{custom_logic_script_id}`; `code` is refused.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsCustomLogicScript(ExsitedClient $client, int|string $customLogicScriptId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(SettingsUrls::SETTINGS_CUSTOM_LOGIC_SCRIPT, pathParams: ['custom_logic_script_id' => $customLogicScriptId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsCustomLogicScriptSaved::class);
    }

    /** Soft-delete a custom logic script - `DELETE
     *  /settings/custom_logic_scripts/{custom_logic_script_id}`; `204`. */
    public static function deleteSettingsCustomLogicScript(ExsitedClient $client, int|string $customLogicScriptId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(SettingsUrls::SETTINGS_CUSTOM_LOGIC_SCRIPT, pathParams: ['custom_logic_script_id' => $customLogicScriptId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Create a discount profile - `POST /settings/discount_profiles`; `201`. Times go as
     *  `YYYY-MM-DD HH:mm` and the accounting code must be a discount one, or it is a `500`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsDiscountProfile(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(SettingsUrls::SETTINGS_DISCOUNT_PROFILES, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsDiscountProfileRead::class);
    }

    /** Get one discount profile - `GET /settings/discount_profiles/{discount_profile_id}`, under
     *  `discount_profile`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsDiscountProfile(ExsitedClient $client, int|string $discountProfileId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::SETTINGS_DISCOUNT_PROFILE, pathParams: ['discount_profile_id' => $discountProfileId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsDiscountProfileRead::class);
    }

    /** Update a discount profile - `PATCH /settings/discount_profiles/{discount_profile_id}`,
     *  under `discount_profile`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsDiscountProfile(ExsitedClient $client, int|string $discountProfileId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(SettingsUrls::SETTINGS_DISCOUNT_PROFILE, pathParams: ['discount_profile_id' => $discountProfileId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsDiscountProfileRead::class);
    }

    /** Delete a discount profile - `DELETE /settings/discount_profiles/{discount_profile_id}`;
     *  answered `204`. */
    public static function deleteSettingsDiscountProfile(ExsitedClient $client, int|string $discountProfileId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(SettingsUrls::SETTINGS_DISCOUNT_PROFILE, pathParams: ['discount_profile_id' => $discountProfileId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** List field settings - `GET /settings/field_settings`; paged by cursor, and
     *  `include_total=true` is refused.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsFieldSettings(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::SETTINGS_FIELD_SETTINGS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsFieldSettingList::class);
    }

    /** Get one field setting - `GET /settings/field_settings/{field_setting_id}`, under
     *  `field_setting`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsFieldSetting(ExsitedClient $client, int|string $fieldSettingId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::SETTINGS_FIELD_SETTING, pathParams: ['field_setting_id' => $fieldSettingId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsFieldSettingRead::class);
    }

    /** Read one group of general settings - `GET /settings/general_settings/{group}`, under
     *  `general_settings`; `group` is one of the twelve the server names, any case.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsGeneralSettings(ExsitedClient $client, int|string $group, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::SETTINGS_GENERAL_SETTINGS_GROUP, pathParams: ['group' => $group], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsGeneralSettings::class);
    }

    /** One general setting row - `GET /settings/general_settings/{group}/{general_setting_id}`; no
     *  v4 answer carries a `gs_` id.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsGeneralSetting(ExsitedClient $client, int|string $group, int|string $generalSettingId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::SETTINGS_GENERAL_SETTING, pathParams: ['group' => $group, 'general_setting_id' => $generalSettingId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update the dashboard group - `PATCH /settings/general_settings/dashboard`. Flags are stored
     *  as `"1"`/`"0"` and read back raw, so a `"true"` cannot be restored.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsGeneralSettingsDashboard(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(SettingsUrls::SETTINGS_GENERAL_SETTINGS_DASHBOARD, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsGeneralSettings::class);
    }

    /** Update the date and time group - `PATCH /settings/general_settings/date_and_time`; the save
     *  also pushes the organisation to the catalogue processor.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsGeneralSettingsDateAndTime(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(SettingsUrls::SETTINGS_GENERAL_SETTINGS_DATE_AND_TIME, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsGeneralSettings::class);
    }

    /** Update the display group - `PATCH /settings/general_settings/display`. Column lists sent as
     *  the strings the read serves are ignored: the save reads arrays.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsGeneralSettingsDisplay(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(SettingsUrls::SETTINGS_GENERAL_SETTINGS_DISPLAY, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsGeneralSettings::class);
    }

    /** Update the general group - `PATCH /settings/general_settings/general`. It also resets
     *  `accountingPeriod`, `fiscalYear` and six more settings no route can write back.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsGeneralSettingsGeneral(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(SettingsUrls::SETTINGS_GENERAL_SETTINGS_GENERAL, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsGeneralSettings::class);
    }

    /** Update the labour general settings - `PATCH /settings/general_settings/labour`; answers the
     *  group as `GET` reads it, under `general_settings`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsGeneralSettingsLabour(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(SettingsUrls::SETTINGS_GENERAL_SETTINGS_LABOUR, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsGeneralSettings::class);
    }

    /** Update the order group - `PATCH /settings/general_settings/order`, which reads `order` and
     *  `product` from `general_settings`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsGeneralSettingsOrder(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(SettingsUrls::SETTINGS_GENERAL_SETTINGS_ORDER, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsGeneralSettings::class);
    }

    /** Update the portal group - `PATCH /settings/general_settings/portal`. With
     *  `enableCustomerPortal` off, any write also turns every portal login off.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsGeneralSettingsPortal(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(SettingsUrls::SETTINGS_GENERAL_SETTINGS_PORTAL, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsGeneralSettings::class);
    }

    /** Update the purchase general settings - `PATCH /settings/general_settings/purchase`; answers
     *  the group as `GET` reads it, under `general_settings`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsGeneralSettingsPurchase(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(SettingsUrls::SETTINGS_GENERAL_SETTINGS_PURCHASE, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsGeneralSettings::class);
    }

    /** Update the security group - `PATCH /settings/general_settings/security`. Send flags as
     *  `"1"`/`"0"`: the `"true"` the read serves is stored as false.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsGeneralSettingsSecurity(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(SettingsUrls::SETTINGS_GENERAL_SETTINGS_SECURITY, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsGeneralSettings::class);
    }

    /** Update the transaction general settings - `PATCH /settings/general_settings/transaction`;
     *  answers the group as `GET` reads it, under `general_settings`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsGeneralSettingsTransaction(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(SettingsUrls::SETTINGS_GENERAL_SETTINGS_TRANSACTION, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsGeneralSettings::class);
    }

    /** Create an offline payment processor - `POST /settings/payment_processors`; `201`. Refused
     *  unless `credentials.maximumRetryOnFailure` is `"0"` or `"1"`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsPaymentProcessor(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(SettingsUrls::SETTINGS_PAYMENT_PROCESSORS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsPaymentProcessorSaved::class);
    }

    /** Get one payment processor - `GET /settings/payment_processors/{payment_processor_id}`,
     *  under `payment_processor`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsPaymentProcessor(ExsitedClient $client, int|string $paymentProcessorId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::SETTINGS_PAYMENT_PROCESSOR, pathParams: ['payment_processor_id' => $paymentProcessorId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsPaymentProcessorRead::class);
    }

    /** Update a payment processor - `PATCH /settings/payment_processors/{payment_processor_id}`;
     *  refused, like the create, without `credentials.maximumRetryOnFailure`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsPaymentProcessor(ExsitedClient $client, int|string $paymentProcessorId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(SettingsUrls::SETTINGS_PAYMENT_PROCESSOR, pathParams: ['payment_processor_id' => $paymentProcessorId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsPaymentProcessorSaved::class);
    }

    /** Delete a payment processor - `DELETE /settings/payment_processors/{payment_processor_id}`;
     *  answered `204`. The default processor is refused. */
    public static function deleteSettingsPaymentProcessor(ExsitedClient $client, int|string $paymentProcessorId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(SettingsUrls::SETTINGS_PAYMENT_PROCESSOR, pathParams: ['payment_processor_id' => $paymentProcessorId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Create a payment term - `POST /settings/payment_terms`; answered `201` with a flat `period`
     *  and `duration` where the read nests them. A sent `status` is not applied.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsPaymentTerm(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(SettingsUrls::SETTINGS_PAYMENT_TERMS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsPaymentTermCreated::class);
    }

    /** Get one payment term - `GET /settings/payment_terms/{payment_term_id}`, under
     *  `payment_term`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsPaymentTerm(ExsitedClient $client, int|string $paymentTermId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::SETTINGS_PAYMENT_TERM, pathParams: ['payment_term_id' => $paymentTermId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsPaymentTermRead::class);
    }

    /** Update a payment term - `PATCH /settings/payment_terms/{payment_term_id}`, under
     *  `payment_term`; the answer adds `display_order` to the read's fields.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsPaymentTerm(ExsitedClient $client, int|string $paymentTermId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(SettingsUrls::SETTINGS_PAYMENT_TERM, pathParams: ['payment_term_id' => $paymentTermId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsPaymentTermUpdated::class);
    }

    /** Delete a payment term - `DELETE /settings/payment_terms/{payment_term_id}`; answered `204`. */
    public static function deleteSettingsPaymentTerm(ExsitedClient $client, int|string $paymentTermId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(SettingsUrls::SETTINGS_PAYMENT_TERM, pathParams: ['payment_term_id' => $paymentTermId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Create a pricing level - `POST /settings/pricing_levels`; answered `201`, under
     *  `pricing_level`. `name` is required, and a sent `status` is not applied.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsPricingLevel(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(SettingsUrls::SETTINGS_PRICING_LEVELS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsPricingLevelCreated::class);
    }

    /** Get one pricing level - `GET /settings/pricing_levels/{pricing_level_id}`, under
     *  `pricing_level`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsPricingLevel(ExsitedClient $client, int|string $pricingLevelId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::SETTINGS_PRICING_LEVEL, pathParams: ['pricing_level_id' => $pricingLevelId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsPricingLevelRead::class);
    }

    /** Update a pricing level - `PATCH /settings/pricing_levels/{pricing_level_id}`, under
     *  `pricing_level`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsPricingLevel(ExsitedClient $client, int|string $pricingLevelId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(SettingsUrls::SETTINGS_PRICING_LEVEL, pathParams: ['pricing_level_id' => $pricingLevelId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsPricingLevelRead::class);
    }

    /** Delete a pricing level - `DELETE /settings/pricing_levels/{pricing_level_id}`; answered
     *  `204`. The default level is refused. */
    public static function deleteSettingsPricingLevel(ExsitedClient $client, int|string $pricingLevelId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(SettingsUrls::SETTINGS_PRICING_LEVEL, pathParams: ['pricing_level_id' => $pricingLevelId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Create a shipping profile - `POST /settings/shipping_profiles`; `201`. `name` and
     *  `shipping_type` are required, and `FIXED` needs `fixed_amount`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsShippingProfile(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(SettingsUrls::SETTINGS_SHIPPING_PROFILES, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsShippingProfileRead::class);
    }

    /** Get one shipping profile - `GET /settings/shipping_profiles/{shipping_profile_id}`, under
     *  `shipping_profile`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsShippingProfile(ExsitedClient $client, int|string $shippingProfileId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::SETTINGS_SHIPPING_PROFILE, pathParams: ['shipping_profile_id' => $shippingProfileId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsShippingProfileRead::class);
    }

    /** Update a shipping profile - `PATCH /settings/shipping_profiles/{shipping_profile_id}`.
     *  Answers `500` for every body, so it names no view.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsShippingProfile(ExsitedClient $client, int|string $shippingProfileId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(SettingsUrls::SETTINGS_SHIPPING_PROFILE, pathParams: ['shipping_profile_id' => $shippingProfileId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Delete a shipping profile - `DELETE /settings/shipping_profiles/{shipping_profile_id}`;
     *  answered `204`. */
    public static function deleteSettingsShippingProfile(ExsitedClient $client, int|string $shippingProfileId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(SettingsUrls::SETTINGS_SHIPPING_PROFILE, pathParams: ['shipping_profile_id' => $shippingProfileId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Create a warehouse - `POST /settings/warehouses`; answered `201`. `name` and `country` are
     *  required, and the answer's `country` reads null although it was stored.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsWarehouse(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(SettingsUrls::SETTINGS_WAREHOUSES, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsWarehouseRead::class);
    }

    /** Get one warehouse - `GET /settings/warehouses/{warehouse_id}`, under `warehouse`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsWarehouse(ExsitedClient $client, int|string $warehouseId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::SETTINGS_WAREHOUSE, pathParams: ['warehouse_id' => $warehouseId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsWarehouseRead::class);
    }

    /** Update a warehouse - `PATCH /settings/warehouses/{warehouse_id}`, under `warehouse`; the
     *  answer's `country` reads null although the record has one.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsWarehouse(ExsitedClient $client, int|string $warehouseId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(SettingsUrls::SETTINGS_WAREHOUSE, pathParams: ['warehouse_id' => $warehouseId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsWarehouseRead::class);
    }

    /** Delete a warehouse - `DELETE /settings/warehouses/{warehouse_id}`; answered `204`. */
    public static function deleteSettingsWarehouse(ExsitedClient $client, int|string $warehouseId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(SettingsUrls::SETTINGS_WAREHOUSE, pathParams: ['warehouse_id' => $warehouseId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Create a country tax - `POST /settings/taxes`; answered `201`, under `tax`. `code` and
     *  `country` are required, and v4 has no route that deletes a tax.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsTax(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(SettingsUrls::SETTINGS_TAXES, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Get one tax - `GET /settings/taxes/{tax_id}`, under `tax`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsTax(ExsitedClient $client, int|string $taxId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(SettingsUrls::SETTINGS_TAX, pathParams: ['tax_id' => $taxId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsTaxRead::class);
    }

    /** Update, enable or disable a tax - `PATCH /settings/taxes/{tax_id}`, under `tax`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsTax(ExsitedClient $client, int|string $taxId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(SettingsUrls::SETTINGS_TAX, pathParams: ['tax_id' => $taxId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Delete a variation - `DELETE /settings/variations/{variation_id}`; answered `204`. */
    public static function deleteSettingsVariation(ExsitedClient $client, int|string $variationId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(SettingsUrls::SETTINGS_VARIATION, pathParams: ['variation_id' => $variationId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
