<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseExpress\PurchaseExpressDto;

use Exsited\Client\Dto;

/** A `PurchaseExpress`'s `kpis`. */
final class PurchaseExpressKpis extends Dto
{
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
