<?php

declare(strict_types=1);

namespace Exsited\Resources\ReturnVendorAuthorizations;

use Exsited\Client\ApiResponse;
use Exsited\Client\Dto;
use Exsited\Client\ExsitedClient;
use Exsited\Errors\SdkUsageError;
use Exsited\Resources\ReturnVendorAuthorizations\ReturnVendorAuthorizationsDto\ReturnVendorAuthorizationList;
use Exsited\Resources\ReturnVendorAuthorizations\ReturnVendorAuthorizationsDto\ReturnVendorAuthorizationView;

/** Return vendor authorization endpoints, under `/api/{api_version}`. */
final class ReturnVendorAuthorizations
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** Create RVA - `POST /return_vendor_authorizations`, `{"return_vendor_authorization":
     *  {"purchase_order", "lines": [{"purchase_order_line", "rva_qty"}]}}`; answered `201`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createReturnVendorAuthorization(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ReturnVendorAuthorizationsUrls::RETURN_VENDOR_AUTHORIZATIONS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ReturnVendorAuthorizationView::class);
    }

    /** Delete draft RVA - `DELETE /return_vendor_authorizations/{rva_id}`, the `rva_` id only; a
     *  code answers `404`, and anything but a draft `400` `stock_committed`. */
    public static function deleteReturnVendorAuthorization(ExsitedClient $client, int|string $rvaId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(ReturnVendorAuthorizationsUrls::RETURN_VENDOR_AUTHORIZATION, pathParams: ['rva_id' => $rvaId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Edit RVA header - `PATCH /return_vendor_authorizations/{rva_id}`, the `rva_` id or the
     *  code, `{"return_vendor_authorization": {...}}` of `rva_date`, `note` and
     *  `custom_attributes`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateReturnVendorAuthorization(ExsitedClient $client, int|string $rvaId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(ReturnVendorAuthorizationsUrls::RETURN_VENDOR_AUTHORIZATION, pathParams: ['rva_id' => $rvaId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ReturnVendorAuthorizationView::class);
    }

    /** Delete RVA note - `DELETE /return_vendor_authorizations/{rva_id}/notes/{note_id}`, the
     *  `rva_` id; no route lists or creates an RVA's notes. */
    public static function deleteReturnVendorAuthorizationNote(ExsitedClient $client, int|string $rvaId, int|string $noteId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(ReturnVendorAuthorizationsUrls::RETURN_VENDOR_AUTHORIZATION_NOTE, pathParams: ['rva_id' => $rvaId, 'note_id' => $noteId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Delete RVA note attachment - `DELETE
     *  /return_vendor_authorizations/{rva_id}/notes/{note_id}/files/{file_id}`. */
    public static function deleteReturnVendorAuthorizationNoteFile(ExsitedClient $client, int|string $rvaId, int|string $noteId, int|string $fileId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(ReturnVendorAuthorizationsUrls::RETURN_VENDOR_AUTHORIZATION_NOTE_FILE, pathParams: ['rva_id' => $rvaId, 'note_id' => $noteId, 'file_id' => $fileId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** List RVAs - `GET /return_vendor_authorizations`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getReturnVendorAuthorizations(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ReturnVendorAuthorizationsUrls::RETURN_VENDOR_AUTHORIZATIONS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ReturnVendorAuthorizationList::class);
    }

    /** Get RVA - `GET /return_vendor_authorizations/{rva_id}`, the `rva_` id or the code.
     *  @param array<string,mixed>|null $queryParams */
    public static function getReturnVendorAuthorization(ExsitedClient $client, int|string $rvaId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ReturnVendorAuthorizationsUrls::RETURN_VENDOR_AUTHORIZATION, pathParams: ['rva_id' => $rvaId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ReturnVendorAuthorizationView::class);
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
