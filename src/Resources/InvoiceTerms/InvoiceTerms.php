<?php

declare(strict_types=1);

namespace Exsited\Resources\InvoiceTerms;

use Exsited\Client\ApiResponse;
use Exsited\Client\Dto;
use Exsited\Client\ExsitedClient;
use Exsited\Errors\SdkUsageError;
use Exsited\Resources\InvoiceTerms\InvoiceTermsDto\SettingsInvoiceTerm;
use Exsited\Resources\InvoiceTerms\InvoiceTermsDto\SettingsInvoiceTermList;
use Exsited\Resources\InvoiceTerms\InvoiceTermsDto\SettingsInvoiceTermWrite;

/** Invoice term endpoints, under `/api/{api_version}/settings/invoice_terms`. */
final class InvoiceTerms
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List invoice terms - `GET /settings/invoice_terms`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsInvoiceTerms(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(InvoiceTermsUrls::SETTINGS_INVOICE_TERMS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsInvoiceTermList::class);
    }

    /** Create an invoice term - `POST /settings/invoice_terms`; the answer is flat, where a read
     *  nests `duration`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsInvoiceTerm(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(InvoiceTermsUrls::SETTINGS_INVOICE_TERMS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsInvoiceTermWrite::class);
    }

    /** Get one invoice term - `GET /settings/invoice_terms/{invoice_term_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsInvoiceTerm(ExsitedClient $client, int|string $invoiceTermId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(InvoiceTermsUrls::SETTINGS_INVOICE_TERM, pathParams: ['invoice_term_id' => $invoiceTermId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsInvoiceTerm::class);
    }

    /** Delete an invoice term - `DELETE /settings/invoice_terms/{invoice_term_id}`. */
    public static function deleteSettingsInvoiceTerm(ExsitedClient $client, int|string $invoiceTermId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(InvoiceTermsUrls::SETTINGS_INVOICE_TERM, pathParams: ['invoice_term_id' => $invoiceTermId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update or enable/disable an invoice term - `PATCH
     *  /settings/invoice_terms/{invoice_term_id}`; the answer is flat, where a read nests
     *  `duration`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsInvoiceTerm(ExsitedClient $client, int|string $invoiceTermId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(InvoiceTermsUrls::SETTINGS_INVOICE_TERM, pathParams: ['invoice_term_id' => $invoiceTermId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsInvoiceTermWrite::class);
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
