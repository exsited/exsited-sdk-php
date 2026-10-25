<?php

declare(strict_types=1);

namespace Exsited\Resources\Orders\OrdersDto;

use Exsited\Client\Dto;

/** The `kpis` object of OrderRead. */
final class OrderReadKpis extends Dto
{
    public function __construct(
        public readonly mixed $createdOn = null,
        public readonly mixed $deletedAt = null,
        public readonly ?string $estimatedTotal = null,
        public readonly mixed $lastCancelledAt = null,
        public readonly mixed $lastChangedAt = null,
        public readonly mixed $lastInvoiceIssueDate = null,
        public readonly ?string $lastInvoiceTotal = null,
        public readonly mixed $lastReactivatedAt = null,
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $monthlyRecurringRevenue = null,
        public readonly mixed $nextInvoiceIssueDate = null,
        public readonly ?string $object = null,
        public readonly mixed $startDate = null,
        public readonly ?string $totalCollected = null,
        public readonly ?string $totalDue = null,
        public readonly ?int $totalInvoice = null,
        public readonly ?string $totalOutstanding = null,
        public readonly ?string $totalRevenue = null,
    ) {
    }
}
