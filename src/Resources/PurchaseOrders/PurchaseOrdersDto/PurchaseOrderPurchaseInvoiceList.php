<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** A page of PurchaseOrderPurchaseInvoice records under `data`; an unreadable entry is null and
 *  keeps its place. */
final class PurchaseOrderPurchaseInvoiceList extends Dto
{
    /** The endpoints this page view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_orders/{purchase_order_id}/purchase_invoices',
    ];

    /** @param list<PurchaseOrderPurchaseInvoice|null>|null $data */
    public function __construct(
        #[ListOf(PurchaseOrderPurchaseInvoice::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
