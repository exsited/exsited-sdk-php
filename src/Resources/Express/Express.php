<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Express;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\Express\ExpressDto\ExpressView;

/** Express endpoints, under `/api/{api_version}/express`. */
final class Express
{
    /** CUSTOMER_AND_SUPPLIER account type - `POST /express`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createExpress(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ExpressUrls::EXPRESS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ExpressView::class);
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
