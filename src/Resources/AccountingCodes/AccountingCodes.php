<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\AccountingCodes;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\AccountingCodes\AccountingCodesDto\SettingsAccountingCode;
use Exsited\Sdk\Resources\AccountingCodes\AccountingCodesDto\SettingsAccountingCodeList;

/** Accounting code endpoints, under `/api/{api_version}/settings/accounting_codes`. */
final class AccountingCodes
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List all - `GET /settings/accounting_codes`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsAccountingCodes(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountingCodesUrls::SETTINGS_ACCOUNTING_CODES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsAccountingCodeList::class);
    }

    /** Create accounting code - `POST /settings/accounting_codes`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsAccountingCode(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(AccountingCodesUrls::SETTINGS_ACCOUNTING_CODES, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsAccountingCode::class);
    }

    /** Get single - `GET /settings/accounting_codes/{accounting_code_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsAccountingCode(ExsitedClient $client, int|string $accountingCodeId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountingCodesUrls::SETTINGS_ACCOUNTING_CODE, pathParams: ['accounting_code_id' => $accountingCodeId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsAccountingCode::class);
    }

    /** Delete accounting code - `DELETE /settings/accounting_codes/{accounting_code_id}`. */
    public static function deleteSettingsAccountingCode(ExsitedClient $client, int|string $accountingCodeId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(AccountingCodesUrls::SETTINGS_ACCOUNTING_CODE, pathParams: ['accounting_code_id' => $accountingCodeId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update accounting code - `PATCH /settings/accounting_codes/{accounting_code_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsAccountingCode(ExsitedClient $client, int|string $accountingCodeId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(AccountingCodesUrls::SETTINGS_ACCOUNTING_CODE, pathParams: ['accounting_code_id' => $accountingCodeId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsAccountingCode::class);
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
