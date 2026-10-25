<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ProformaInvoices;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;

/** Pro-forma invoice endpoints, under `/api/{api_version}/proforma_invoices`. The server
 *  lists only the pro-forma invoices whose invoice status is active. */
final class ProformaInvoices
{
    /** List pro-forma invoices - `GET /proforma_invoices`; paged by cursor, under `data`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getProformaInvoices(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ProformaInvoicesUrls::PROFORMA_INVOICES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Retrieve one pro-forma invoice - `GET /proforma_invoices/{proforma_id}`, by its code; under
     *  `proforma_invoice`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getProformaInvoice(ExsitedClient $client, int|string $proformaId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ProformaInvoicesUrls::PROFORMA_INVOICE, pathParams: ['proforma_id' => $proformaId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Delete a pro-forma invoice - `DELETE /proforma_invoices/{proforma_id}`; `204`. A paid one
     *  is refused `400` `already_paid`. */
    public static function deleteProformaInvoice(ExsitedClient $client, int|string $proformaId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(ProformaInvoicesUrls::PROFORMA_INVOICE, pathParams: ['proforma_id' => $proformaId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Pay a pro-forma invoice - `POST /proforma_invoices/{proforma_id}/payments`, wrapped in
     *  `payment`; `201`, answering the new payment's code as `payment.payment_id`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createProformaInvoicePayment(ExsitedClient $client, int|string $proformaId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ProformaInvoicesUrls::PROFORMA_INVOICE_PAYMENTS, pathParams: ['proforma_id' => $proformaId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
