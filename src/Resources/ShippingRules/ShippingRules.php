<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ShippingRules;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\ShippingRules\ShippingRulesDto\SettingsShippingRule;
use Exsited\Sdk\Resources\ShippingRules\ShippingRulesDto\SettingsShippingRuleList;

/** Shipping rule endpoints, under `/api/{api_version}/settings/shipping_rules`. */
final class ShippingRules
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List shipping rules - `GET /settings/shipping_rules`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsShippingRules(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ShippingRulesUrls::SETTINGS_SHIPPING_RULES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsShippingRuleList::class);
    }

    /** Create a shipping rule - `POST /settings/shipping_rules`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsShippingRule(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ShippingRulesUrls::SETTINGS_SHIPPING_RULES, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsShippingRule::class);
    }

    /** Get one shipping rule - `GET /settings/shipping_rules/{shipping_rule_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsShippingRule(ExsitedClient $client, int|string $shippingRuleId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ShippingRulesUrls::SETTINGS_SHIPPING_RULE, pathParams: ['shipping_rule_id' => $shippingRuleId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsShippingRule::class);
    }

    /** Delete a shipping rule - `DELETE /settings/shipping_rules/{shipping_rule_id}`. */
    public static function deleteSettingsShippingRule(ExsitedClient $client, int|string $shippingRuleId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(ShippingRulesUrls::SETTINGS_SHIPPING_RULE, pathParams: ['shipping_rule_id' => $shippingRuleId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update a shipping rule - `PATCH /settings/shipping_rules/{shipping_rule_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsShippingRule(ExsitedClient $client, int|string $shippingRuleId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(ShippingRulesUrls::SETTINGS_SHIPPING_RULE, pathParams: ['shipping_rule_id' => $shippingRuleId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsShippingRule::class);
    }

    /** Set a shipping rule's zones, rate and tiers - `POST
     *  /settings/shipping_rules/{shipping_rule_id}/configuration`; each `zones[].zone` is the
     *  zone's dashed uuid, not its prefixed id, and the body sits under `configuration`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsShippingRuleConfiguration(ExsitedClient $client, int|string $shippingRuleId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ShippingRulesUrls::SETTINGS_SHIPPING_RULE_CONFIGURATION, pathParams: ['shipping_rule_id' => $shippingRuleId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsShippingRule::class);
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
