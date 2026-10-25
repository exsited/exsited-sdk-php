<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\QuoteOrders;

final class QuoteOrdersUrls
{
    public const QUOTE_ORDER_INVOICES = '/api/{api_version}/quote_orders/{quote_order_id}/invoices';

    /** The key the `QUOTE_ORDER_INVOICES` listing's records sit under. */
    public const QUOTE_ORDER_INVOICES_KEY = 'data';
}
