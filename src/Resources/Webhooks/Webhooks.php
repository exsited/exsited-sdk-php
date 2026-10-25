<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Webhooks;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\ExsitedClient;

/** Webhook endpoints, under `/api/{api_version}/webhooks`. */
final class Webhooks
{
    /** One webhook delivery - `GET /webhooks/{webhook_id}`, the `whk_` id a delivery carries; no
     *  route lists them, so `->dto` is null and the body is read through `->map`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getWebhook(ExsitedClient $client, int|string $webhookId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(WebhooksUrls::WEBHOOK, pathParams: ['webhook_id' => $webhookId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }
}
