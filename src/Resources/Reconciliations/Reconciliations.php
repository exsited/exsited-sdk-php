<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Reconciliations;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\ExsitedClient;

/** Reconciliation endpoints, under `/api/{api_version}/reconciliations`. */
final class Reconciliations
{
    /** List the payments in a reconciliation - `GET
     *  /reconciliations/{reconciliation_id}/sale_payments`; the uuid or the numeric id.
     *  @param array<string,mixed>|null $queryParams */
    public static function getReconciliationSalePayments(ExsitedClient $client, int|string $reconciliationId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ReconciliationsUrls::RECONCILIATION_SALE_PAYMENTS, pathParams: ['reconciliation_id' => $reconciliationId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** List the refunds in a reconciliation - `GET
     *  /reconciliations/{reconciliation_id}/sale_refunds`; the uuid or the numeric id.
     *  @param array<string,mixed>|null $queryParams */
    public static function getReconciliationSaleRefunds(ExsitedClient $client, int|string $reconciliationId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ReconciliationsUrls::RECONCILIATION_SALE_REFUNDS, pathParams: ['reconciliation_id' => $reconciliationId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }
}
