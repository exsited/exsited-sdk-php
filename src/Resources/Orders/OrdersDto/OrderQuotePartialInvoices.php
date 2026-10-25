<?php

declare(strict_types=1);

namespace Exsited\Resources\Orders\OrdersDto;

use Exsited\Client\Dto;

/** What `getOrderQuotePartialInvoices` answers, under `order`. */
final class OrderQuotePartialInvoices extends Dto
{
    public const ENVELOPE_KEY = 'order';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/orders/{order_id}/quote_partial_invoices',
    ];

    public function __construct(
        public readonly ?array $partialInvoices = null,
    ) {
    }
}
