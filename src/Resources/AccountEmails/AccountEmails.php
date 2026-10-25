<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\AccountEmails;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\ExsitedClient;

/** Account email endpoints, under `/api/{api_version}/accounts`. */
final class AccountEmails
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** Delete email - `DELETE /accounts/{account_id}/communications/emails/{email_uuid}`. */
    public static function deleteAccountCommunicationsEmail(ExsitedClient $client, int|string $accountId, int|string $emailUuid, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(AccountEmailsUrls::ACCOUNT_COMMUNICATIONS_EMAIL, pathParams: ['account_id' => $accountId, 'email_uuid' => $emailUuid], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }
}
