<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Client\Dto;

/** The PurchaseOrderLineRead body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseOrderLineRead extends Dto
{
    public const ENVELOPE_KEY = 'purchase_order';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_orders/{purchase_order_id}/lines/{purchase_order_line_uuid}',
    ];

    public function __construct(
        public readonly mixed $line = null,
        public readonly ?PurchaseOrderLineReadDetail $purchaseOrderLine = null,
    ) {
    }
}
