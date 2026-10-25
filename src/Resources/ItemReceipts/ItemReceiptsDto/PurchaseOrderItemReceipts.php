<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ItemReceipts\ItemReceiptsDto;

use Exsited\Sdk\Client\Dto;

/** The PurchaseOrderItemReceipts body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseOrderItemReceipts extends Dto
{
    public const ENVELOPE_KEY = 'purchase_order';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_orders/{purchase_order_id}/item_receipts',
    ];

    public function __construct(
        public readonly ?array $itemReceipts = null,
        public readonly mixed $pagination = null,
    ) {
    }
}
