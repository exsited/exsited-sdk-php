<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseExpress;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\PurchaseExpress\PurchaseExpressDto\PurchaseExpressView;

/** Purchase express endpoints, under `/api/{api_version}/purchase_express`. */
final class PurchaseExpress
{
    /** Create a purchase order, and its purchase invoice and payment if the body nests them, in
     *  one call - `POST /purchase_express`, body `account.purchase_order`; `201`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createPurchaseExpress(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(PurchaseExpressUrls::PURCHASE_EXPRESS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PurchaseExpressView::class);
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
