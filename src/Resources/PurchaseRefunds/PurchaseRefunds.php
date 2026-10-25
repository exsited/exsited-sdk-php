<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseRefunds;

use Exsited\Client\ApiResponse;
use Exsited\Client\Dto;
use Exsited\Client\ExsitedClient;
use Exsited\Errors\SdkUsageError;
use Exsited\Resources\PurchaseRefunds\PurchaseRefundsDto\PurchaseRefund;
use Exsited\Resources\PurchaseRefunds\PurchaseRefundsDto\PurchaseRefundsView;

/** Purchase refund endpoints, under `/api/{api_version}`. */
final class PurchaseRefunds
{
    /** List purchase refunds - `GET /purchase_refunds`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseRefunds(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseRefundsUrls::PURCHASE_REFUNDS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseRefundsView::class);
    }

    /** Get single - `GET /purchase_refunds/{purchase_refund_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getPurchaseRefund(ExsitedClient $client, int|string $purchaseRefundId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(PurchaseRefundsUrls::PURCHASE_REFUND, pathParams: ['purchase_refund_id' => $purchaseRefundId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseRefund::class);
    }

    /** Refund from a purchase credit note - `POST
     *  /purchase_credit_notes/{purchase_credit_note_id}/purchase_refunds`; `201`, as
     *  `getPurchaseRefund` reads it. `payment_method` is the supplier's method reference.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createPurchaseCreditNotePurchaseRefund(ExsitedClient $client, int|string $purchaseCreditNoteId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(PurchaseRefundsUrls::PURCHASE_CREDIT_NOTE_PURCHASE_REFUNDS, pathParams: ['purchase_credit_note_id' => $purchaseCreditNoteId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseRefund::class);
    }

    /** Edit a refund's reference, note, date or attributes - `PATCH
     *  /purchase_refunds/{purchase_refund_id}`, wrapped in `purchase_refund`; the amount cannot
     *  change.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updatePurchaseRefund(ExsitedClient $client, int|string $purchaseRefundId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(PurchaseRefundsUrls::PURCHASE_REFUND, pathParams: ['purchase_refund_id' => $purchaseRefundId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseRefund::class);
    }

    /** Delete a refund - `DELETE /purchase_refunds/{purchase_refund_id}`, by its code; `204`. */
    public static function deletePurchaseRefund(ExsitedClient $client, int|string $purchaseRefundId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(PurchaseRefundsUrls::PURCHASE_REFUND, pathParams: ['purchase_refund_id' => $purchaseRefundId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
