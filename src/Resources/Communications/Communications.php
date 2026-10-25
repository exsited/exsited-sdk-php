<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Communications;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;

/** Communication endpoints, under `/api/{api_version}/communications`. */
final class Communications
{
    /** Email a document - `POST /communications/send_email`; the body names one of `invoice`,
     *  `purchase_invoice`, `account_statement` or `payment`, each an `id` beside `to`, `cc`,
     *  `bcc`, `subject`, `body` and `template`. Sends real mail.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function sendEmail(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(CommunicationsUrls::COMMUNICATIONS_SEND_EMAIL, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
