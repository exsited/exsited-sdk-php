<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Sdk\Client\Dto;

/** The `kpis` object of PurchaseOrderUpdated. */
final class PurchaseOrderUpdatedKpis extends Dto
{
    public function __construct(
        public readonly ?string $estimatedTotal = null,
        public readonly mixed $issueDate = null,
        public readonly mixed $lastCancelledOn = null,
        public readonly mixed $lastChangedOn = null,
        public readonly mixed $lastDeletedOn = null,
        public readonly mixed $lastInvoiceIssueDate = null,
        public readonly ?string $lastInvoiceTotal = null,
        public readonly mixed $lastReactivatedOn = null,
        public readonly ?string $object = null,
        public readonly ?string $totalExpense = null,
        public readonly ?string $totalOutstanding = null,
        public readonly ?string $totalOverdue = null,
        public readonly ?int $totalPurchaseInvoice = null,
    ) {
    }
}
