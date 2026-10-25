<?php

declare(strict_types=1);

namespace Exsited\Resources\EmailTemplates;

use Exsited\Client\ApiResponse;
use Exsited\Client\Dto;
use Exsited\Client\ExsitedClient;
use Exsited\Errors\SdkUsageError;
use Exsited\Resources\EmailTemplates\EmailTemplatesDto\SettingsEmailTemplate;
use Exsited\Resources\EmailTemplates\EmailTemplatesDto\SettingsEmailTemplateList;

/** Email template endpoints, under `/api/{api_version}/settings/email_templates`. */
final class EmailTemplates
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List the email templates shared across the instance - `GET /settings/email_templates`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsEmailTemplates(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(EmailTemplatesUrls::SETTINGS_EMAIL_TEMPLATES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsEmailTemplateList::class);
    }

    /** Create an email template; `name` is required, and `cc` and `bcc` are lists of addresses -
     *  `POST /settings/email_templates`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createSettingsEmailTemplate(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(EmailTemplatesUrls::SETTINGS_EMAIL_TEMPLATES, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsEmailTemplate::class);
    }

    /** Read one email template by its `et_` id - `GET
     *  /settings/email_templates/{email_template_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getSettingsEmailTemplate(ExsitedClient $client, int|string $emailTemplateId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(EmailTemplatesUrls::SETTINGS_EMAIL_TEMPLATE, pathParams: ['email_template_id' => $emailTemplateId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsEmailTemplate::class);
    }

    /** Delete an email template - `DELETE /settings/email_templates/{email_template_id}`. */
    public static function deleteSettingsEmailTemplate(ExsitedClient $client, int|string $emailTemplateId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(EmailTemplatesUrls::SETTINGS_EMAIL_TEMPLATE, pathParams: ['email_template_id' => $emailTemplateId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update an email template's fields or its content - `PATCH
     *  /settings/email_templates/{email_template_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateSettingsEmailTemplate(ExsitedClient $client, int|string $emailTemplateId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(EmailTemplatesUrls::SETTINGS_EMAIL_TEMPLATE, pathParams: ['email_template_id' => $emailTemplateId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: SettingsEmailTemplate::class);
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
