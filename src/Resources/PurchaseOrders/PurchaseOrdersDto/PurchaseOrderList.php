<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** A page of PurchaseOrder records under `data`; an unreadable entry is null and keeps its
 *  place. */
final class PurchaseOrderList extends Dto
{
    /** The endpoints this page view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_orders',
    ];

    /** @param list<PurchaseOrder|null>|null $data */
    public function __construct(
        #[ListOf(PurchaseOrder::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
