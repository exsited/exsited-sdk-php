<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\GiftCertificates;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\GiftCertificates\GiftCertificatesDto\GiftCertificate;
use Exsited\Sdk\Resources\GiftCertificates\GiftCertificatesDto\GiftCertificateAllocationRead;
use Exsited\Sdk\Resources\GiftCertificates\GiftCertificatesDto\GiftCertificateAllocations;
use Exsited\Sdk\Resources\GiftCertificates\GiftCertificatesDto\GiftCertificateList;
use Exsited\Sdk\Resources\GiftCertificates\GiftCertificatesDto\GiftCertificateTransactionList;
use Exsited\Sdk\Resources\GiftCertificates\GiftCertificatesDto\GiftCertificateTransactionRead;

/** Gift certificate endpoints, under `/api/{api_version}/gift_certificates`. */
final class GiftCertificates
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List all - `GET /gift_certificates`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getGiftCertificates(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(GiftCertificatesUrls::GIFT_CERTIFICATES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: GiftCertificateList::class);
    }

    /** Create - `POST /gift_certificates`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createGiftCertificate(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(GiftCertificatesUrls::GIFT_CERTIFICATES, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: GiftCertificate::class);
    }

    /** Delete - `DELETE /gift_certificates/{gc_id}`. */
    public static function deleteGiftCertificate(ExsitedClient $client, int|string $gcId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(GiftCertificatesUrls::GIFT_CERTIFICATE, pathParams: ['gc_id' => $gcId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Single detail - `GET /gift_certificates/{gc_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getGiftCertificate(ExsitedClient $client, int|string $gcId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(GiftCertificatesUrls::GIFT_CERTIFICATE, pathParams: ['gc_id' => $gcId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: GiftCertificate::class);
    }

    /** Update - `PATCH /gift_certificates/{gc_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateGiftCertificate(ExsitedClient $client, int|string $gcId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(GiftCertificatesUrls::GIFT_CERTIFICATE, pathParams: ['gc_id' => $gcId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: GiftCertificate::class);
    }

    /** List gift certificate allocations - `GET /gift_certificates/{gc_id}/allocations`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getGiftCertificateAllocations(ExsitedClient $client, int|string $gcId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(GiftCertificatesUrls::GIFT_CERTIFICATE_ALLOCATIONS, pathParams: ['gc_id' => $gcId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: GiftCertificateAllocations::class);
    }

    /** List gift certificate transactions - `GET /gift_certificates/{gc_id}/transactions`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getGiftCertificateTransactions(ExsitedClient $client, int|string $gcId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(GiftCertificatesUrls::GIFT_CERTIFICATE_TRANSACTIONS, pathParams: ['gc_id' => $gcId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: GiftCertificateTransactionList::class);
    }

    /** Set a new balance - `POST /gift_certificates/{gc_id}/amend`, as `{"gift_certificate":
     *  {"new_balance": ...}}`; a balance below the used amount is a `400`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function amendGiftCertificate(ExsitedClient $client, int|string $gcId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(GiftCertificatesUrls::GIFT_CERTIFICATE_AMEND, pathParams: ['gc_id' => $gcId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: GiftCertificate::class);
    }

    /** Allocate to an account - `POST /gift_certificates/{gc_id}/allocations`, as
     *  `{"gift_certificate": {"account": {"code": ...}}}`; `200`, not `201`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function allocateGiftCertificate(ExsitedClient $client, int|string $gcId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(GiftCertificatesUrls::GIFT_CERTIFICATE_ALLOCATIONS, pathParams: ['gc_id' => $gcId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: GiftCertificate::class);
    }

    /** Take an allocation back from an account - `POST /gift_certificates/{gc_id}/deallocations`,
     *  with the same body `allocateGiftCertificate` takes.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function deallocateGiftCertificate(ExsitedClient $client, int|string $gcId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(GiftCertificatesUrls::GIFT_CERTIFICATE_DEALLOCATIONS, pathParams: ['gc_id' => $gcId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: GiftCertificate::class);
    }

    /** Retrieve one allocation - `GET /gift_certificates/{gc_id}/allocations/{allocation_id}`,
     *  under `gift_certificate_allocation`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getGiftCertificateAllocation(ExsitedClient $client, int|string $gcId, int|string $allocationId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(GiftCertificatesUrls::GIFT_CERTIFICATE_ALLOCATION, pathParams: ['gc_id' => $gcId, 'allocation_id' => $allocationId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: GiftCertificateAllocationRead::class);
    }

    /** Retrieve one transaction - `GET /gift_certificates/{gc_id}/transactions/{transaction_id}`,
     *  under `gift_certificate_transaction`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getGiftCertificateTransaction(ExsitedClient $client, int|string $gcId, int|string $transactionId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(GiftCertificatesUrls::GIFT_CERTIFICATE_TRANSACTION, pathParams: ['gc_id' => $gcId, 'transaction_id' => $transactionId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: GiftCertificateTransactionRead::class);
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
