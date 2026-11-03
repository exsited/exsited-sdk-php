<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Client\Dto;

/** What `getPurchaseOrderKpis` answers, under `purchase_order_kpis`: the block a purchase order
 *  carries as `kpis`. */
final class PurchaseOrderKpis extends Dto
{
    public const ENVELOPE_KEY = 'purchase_order_kpis';

    /** The endpoints this view covers. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_orders/{purchase_order_id}/kpis',
    ];

    public function __construct(
        public readonly ?string $estimatedTotal = null,
        /** Untyped. */
        public readonly mixed $issueDate = null,
        /** Untyped. */
        public readonly mixed $lastCancelledOn = null,
        /** Untyped. */
        public readonly mixed $lastChangedOn = null,
        /** Untyped. */
        public readonly mixed $lastDeletedOn = null,
        /** Untyped. */
        public readonly mixed $lastInvoiceIssueDate = null,
        public readonly ?string $lastInvoiceTotal = null,
        /** Untyped. */
        public readonly mixed $lastReactivatedOn = null,
        public readonly ?string $object = null,
        public readonly ?string $totalExpense = null,
        public readonly ?string $totalOutstanding = null,
        public readonly ?string $totalOverdue = null,
        public readonly ?int $totalPurchaseInvoice = null,
    ) {
    }
}
