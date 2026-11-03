<?php

declare(strict_types=1);

namespace Exsited\Resources\Orders\OrdersDto;

use Exsited\Client\Dto;

/** What `getOrderKpis` answers, under `order_kpis`. */
final class OrderKpis extends Dto
{
    public const ENVELOPE_KEY = 'order_kpis';

    /** The endpoints this view covers. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/orders/{order_id}/kpis',
    ];

    public function __construct(
        /** Untyped. */
        public readonly mixed $deletedAt = null,
        public readonly ?string $estimatedTotal = null,
        /** Untyped. */
        public readonly mixed $lastCancelledAt = null,
        /** Untyped. */
        public readonly mixed $lastChangedAt = null,
        /** Untyped. */
        public readonly mixed $lastInvoiceIssueDate = null,
        public readonly ?string $lastInvoiceTotal = null,
        /** Untyped. */
        public readonly mixed $lastReactivatedAt = null,
        public readonly ?string $monthlyRecurringRevenue = null,
        /** Untyped. */
        public readonly mixed $nextInvoiceIssueDate = null,
        public readonly ?string $object = null,
        /** Untyped. */
        public readonly mixed $startDate = null,
        public readonly ?string $totalCollected = null,
        public readonly ?string $totalDue = null,
        public readonly ?int $totalInvoice = null,
        public readonly ?string $totalOutstanding = null,
        public readonly ?string $totalRevenue = null,
    ) {
    }
}
