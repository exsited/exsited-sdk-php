<?php

declare(strict_types=1);

namespace Exsited\Resources\QuoteOrders;

use Exsited\Client\ApiResponse;
use Exsited\Client\ExsitedClient;
use Exsited\Resources\QuoteOrders\QuoteOrdersDto\QuoteOrderInvoiceList;

/** Quote order endpoints, under `/api/{api_version}/quote_orders`. */
final class QuoteOrders
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List the invoices raised from a quote - `GET /quote_orders/{quote_order_id}/invoices`; an
     *  order that is not a quote answers `404`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getQuoteOrderInvoices(ExsitedClient $client, int|string $quoteOrderId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(QuoteOrdersUrls::QUOTE_ORDER_INVOICES, pathParams: ['quote_order_id' => $quoteOrderId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: QuoteOrderInvoiceList::class);
    }
}
