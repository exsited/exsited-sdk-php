<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\QuoteOrders\QuoteOrdersDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One page of a quote's invoices, under `data`. */
final class QuoteOrderInvoiceList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/quote_orders/{quote_order_id}/invoices',
    ];

    /** @param list<QuoteOrderInvoice|null>|null $data */
    public function __construct(
        #[ListOf(QuoteOrderInvoice::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
