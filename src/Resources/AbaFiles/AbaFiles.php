<?php

declare(strict_types=1);

namespace Exsited\Resources\AbaFiles;

use Exsited\Client\ApiResponse;
use Exsited\Client\Dto;
use Exsited\Client\ExsitedClient;
use Exsited\Errors\SdkUsageError;

/** ABA file endpoints, under `/api/{api_version}/aba_file/generate`. */
final class AbaFiles
{
    /** Generate an ABA file from transactions - `POST /aba_file/generate`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function generateAbaFile(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(AbaFilesUrls::ABA_FILE_GENERATE, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
