<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\DocumentTemplates;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\DocumentTemplates\DocumentTemplatesDto\SettingsDocumentTemplate;
use Exsited\Sdk\Resources\DocumentTemplates\DocumentTemplatesDto\SettingsDocumentTemplateList;

/** Document template endpoints, under `/api/{api_version}/settings/document_templates`. */
final class DocumentTemplates
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List the document templates - `GET /settings/document_templates`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsDocumentTemplates(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(DocumentTemplatesUrls::SETTINGS_DOCUMENT_TEMPLATES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsDocumentTemplateList::class);
    }

    /** Create a document template; `name` and `document_template_type`, such as `PDF_DOCUMENT`,
     *  are required - `POST /settings/document_templates`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsDocumentTemplate(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(DocumentTemplatesUrls::SETTINGS_DOCUMENT_TEMPLATES, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsDocumentTemplate::class);
    }

    /** Read one document template by its `dt_` id - `GET
     *  /settings/document_templates/{document_template_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsDocumentTemplate(ExsitedClient $client, int|string $documentTemplateId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(DocumentTemplatesUrls::SETTINGS_DOCUMENT_TEMPLATE, pathParams: ['document_template_id' => $documentTemplateId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsDocumentTemplate::class);
    }

    /** Delete a document template - `DELETE /settings/document_templates/{document_template_id}`. */
    public static function deleteSettingsDocumentTemplate(ExsitedClient $client, int|string $documentTemplateId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(DocumentTemplatesUrls::SETTINGS_DOCUMENT_TEMPLATE, pathParams: ['document_template_id' => $documentTemplateId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update a document template's fields or its content - `PATCH
     *  /settings/document_templates/{document_template_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsDocumentTemplate(ExsitedClient $client, int|string $documentTemplateId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(DocumentTemplatesUrls::SETTINGS_DOCUMENT_TEMPLATE, pathParams: ['document_template_id' => $documentTemplateId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsDocumentTemplate::class);
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
