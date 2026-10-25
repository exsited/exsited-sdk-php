<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseCreditNoteApplications;

use Exsited\Client\ApiResponse;
use Exsited\Client\ExsitedClient;
use Exsited\Resources\PurchaseCreditNoteApplications\PurchaseCreditNoteApplicationsDto\PurchaseCreditNoteApplicationList;
use Exsited\Resources\PurchaseCreditNoteApplications\PurchaseCreditNoteApplicationsDto\PurchaseCreditNoteApplicationRead;

/** Purchase credit note application endpoints, under `/api/{api_version}`. */
final class PurchaseCreditNoteApplications
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List purchase credit note applications - `GET /purchase_credit_note_applications`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseCreditNoteApplications(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseCreditNoteApplicationsUrls::PURCHASE_CREDIT_NOTE_APPLICATIONS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseCreditNoteApplicationList::class);
    }

    /** Get single - `GET /purchase_credit_note_applications/{purchase_credit_note_applicat
     *  ion_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseCreditNoteApplication(ExsitedClient $client, int|string $purchaseCreditNoteApplicationId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseCreditNoteApplicationsUrls::PURCHASE_CREDIT_NOTE_APPLICATION, pathParams: ['purchase_credit_note_application_id' => $purchaseCreditNoteApplicationId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseCreditNoteApplicationRead::class);
    }
}
