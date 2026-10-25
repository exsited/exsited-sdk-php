<?php

declare(strict_types=1);

namespace Exsited\Resources\Invoices\InvoicesDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** A page of Invoice records under `data`; an unreadable entry is null and keeps its place. */
final class InvoiceList extends Dto
{
    /** The endpoints this page view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/invoices',
        'GET /api/{api_version}/orders/{order_id}/invoices',
    ];

    /** @param list<Invoice|null>|null $data */
    public function __construct(
        #[ListOf(Invoice::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
