<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Client\Dto;

/** What `getPurchaseOrderKpis` answers, under `purchase_order_kpis`: the block a purchase order
 *  carries as `kpis`. */
final class PurchaseOrderKpis extends Dto
{
    public const ENVELOPE_KEY = 'purchase_order_kpis';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_orders/{purchase_order_id}/kpis',
    ];

    public function __construct(
        public readonly ?string $estimatedTotal = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $issueDate = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastCancelledOn = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastChangedOn = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastDeletedOn = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastInvoiceIssueDate = null,
        public readonly ?string $lastInvoiceTotal = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastReactivatedOn = null,
        public readonly ?string $object = null,
        public readonly ?string $totalExpense = null,
        public readonly ?string $totalOutstanding = null,
        public readonly ?string $totalOverdue = null,
        public readonly ?int $totalPurchaseInvoice = null,
    ) {
    }
}
