<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Portals;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\Portals\PortalsDto\PortalChangePassword;
use Exsited\Sdk\Resources\Portals\PortalsDto\PortalLogin;
use Exsited\Sdk\Resources\Portals\PortalsDto\PortalResetLink;

/** Portal endpoints, under `/api/{api_version}/portal`. */
final class Portals
{
    /** Activate portal account - `POST /portal/activate`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function activatePortal(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(PortalsUrls::PORTAL_ACTIVATE, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Change password - `POST /portal/change_password`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createPortalChangePassword(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(PortalsUrls::PORTAL_CHANGE_PASSWORD, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PortalChangePassword::class);
    }

    /** Portal login - `POST /portal/login`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createPortalLogin(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(PortalsUrls::PORTAL_LOGIN, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PortalLogin::class);
    }

    /** Reset password - `POST /portal/reset`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createPortalReset(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(PortalsUrls::PORTAL_RESET, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Request reset link - `POST /portal/reset_link`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createPortalResetLink(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(PortalsUrls::PORTAL_RESET_LINK, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: PortalResetLink::class);
    }

    /** Validate account - `POST /portal/validate`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createPortalValidate(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(PortalsUrls::PORTAL_VALIDATE, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Set a portal password by email - `POST /portal/change`, `{"portal": {"email",
     *  "password"}}`; no current password is asked, and it answers `202`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function setPortalPassword(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(PortalsUrls::PORTAL_CHANGE, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
