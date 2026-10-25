<?php

declare(strict_types=1);

namespace Exsited\Resources\Approvals;

use Exsited\Client\ApiResponse;
use Exsited\Client\Dto;
use Exsited\Client\ExsitedClient;
use Exsited\Errors\SdkUsageError;
use Exsited\Resources\Approvals\ApprovalsDto\ApprovalsAccountList;
use Exsited\Resources\Approvals\ApprovalsDto\ApprovalsSaleorder;

/** Approval endpoints, under `/api/{api_version}/approvals`. */
final class Approvals
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List account approvals - `GET /approvals/account`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getApprovalsAccount(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ApprovalsUrls::APPROVALS_ACCOUNT, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ApprovalsAccountList::class);
    }

    /** List sale order approvals - `GET /approvals/saleOrder`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getApprovalsSaleorder(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ApprovalsUrls::APPROVALS_SALEORDER, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ApprovalsSaleorder::class);
    }

    /** Get single account approval - `GET /approvals/account/{account_uuid}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getApprovalsAccountByUuid(ExsitedClient $client, int|string $accountUuid, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ApprovalsUrls::APPROVALS_ACCOUNT_BY_UUID, pathParams: ['account_uuid' => $accountUuid], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Approve a pending approval - `POST /approvals/approve`, `{"approval": {"entity",
     *  "resource_id", "note"}}` for any of the 16 entities; it runs the held action.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function approveApproval(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ApprovalsUrls::APPROVALS_APPROVE, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Reject a pending approval - `POST /approvals/reject`, the same `{"approval": {"entity",
     *  "resource_id", "note"}}` body as `approveApproval`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function rejectApproval(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ApprovalsUrls::APPROVALS_REJECT, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
