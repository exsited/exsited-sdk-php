<?php

declare(strict_types=1);

namespace Exsited\Resources\AttributeAttachments;

use Exsited\Client\ApiResponse;
use Exsited\Client\ExsitedClient;

/** Attribute attachment endpoints, under `/api/{api_version}/attribute_attachment`. */
final class AttributeAttachments
{
    /** A custom attribute's file as base64 - `GET /attribute_attachment/{file_uuid}`, the uuid an
     *  account's file attribute links to; answered as `{"base64": ...}` with no envelope.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAttributeAttachment(ExsitedClient $client, int|string $fileUuid, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AttributeAttachmentsUrls::ATTRIBUTE_ATTACHMENT, pathParams: ['file_uuid' => $fileUuid], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }
}
