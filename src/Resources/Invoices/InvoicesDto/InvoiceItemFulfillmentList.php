<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Invoices\InvoicesDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** A page of InvoiceItemFulfillment records under `data`; an unreadable entry is null and keeps its
 *  place. */
final class InvoiceItemFulfillmentList extends Dto
{
    /** The endpoints this page view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/invoices/{invoice_id}/item_fulfillments',
    ];

    /** @param list<InvoiceItemFulfillment|null>|null $data */
    public function __construct(
        #[ListOf(InvoiceItemFulfillment::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
