<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Orders\OrdersDto;

use Exsited\Sdk\Client\Dto;

/** What `getOrderKpis` answers, under `order_kpis`. */
final class OrderKpis extends Dto
{
    public const ENVELOPE_KEY = 'order_kpis';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/orders/{order_id}/kpis',
    ];

    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $deletedAt = null,
        public readonly ?string $estimatedTotal = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastCancelledAt = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastChangedAt = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastInvoiceIssueDate = null,
        public readonly ?string $lastInvoiceTotal = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastReactivatedAt = null,
        public readonly ?string $monthlyRecurringRevenue = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $nextInvoiceIssueDate = null,
        public readonly ?string $object = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $startDate = null,
        public readonly ?string $totalCollected = null,
        public readonly ?string $totalDue = null,
        public readonly ?int $totalInvoice = null,
        public readonly ?string $totalOutstanding = null,
        public readonly ?string $totalRevenue = null,
    ) {
    }
}
