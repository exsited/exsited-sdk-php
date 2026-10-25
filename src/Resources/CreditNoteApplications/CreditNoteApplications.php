<?php

declare(strict_types=1);

namespace Exsited\Resources\CreditNoteApplications;

use Exsited\Client\ApiResponse;
use Exsited\Client\ExsitedClient;
use Exsited\Resources\CreditNoteApplications\CreditNoteApplicationsDto\CreditNoteApplicationList;
use Exsited\Resources\CreditNoteApplications\CreditNoteApplicationsDto\CreditNoteApplicationRead;
use Exsited\Resources\CreditNoteApplications\CreditNoteApplicationsDto\InvoiceCreditNoteApplications;

/** Credit note application endpoints, under `/api/{api_version}`. */
final class CreditNoteApplications
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List credit note applications - `GET /credit_note_applications`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getCreditNoteApplications(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CreditNoteApplicationsUrls::CREDIT_NOTE_APPLICATIONS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: CreditNoteApplicationList::class);
    }

    /** Get single - `GET /credit_note_applications/{credit_note_application_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getCreditNoteApplication(ExsitedClient $client, int|string $creditNoteApplicationId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CreditNoteApplicationsUrls::CREDIT_NOTE_APPLICATION, pathParams: ['credit_note_application_id' => $creditNoteApplicationId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: CreditNoteApplicationRead::class);
    }

    /** List invoice credit note applications - `GET
     *  /invoices/{invoice_id}/credit_note_applications`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getInvoiceCreditNoteApplications(ExsitedClient $client, int|string $invoiceId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(CreditNoteApplicationsUrls::INVOICE_CREDIT_NOTE_APPLICATIONS, pathParams: ['invoice_id' => $invoiceId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: InvoiceCreditNoteApplications::class);
    }
}
