<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseExpress\PurchaseExpressDto;

use Exsited\Client\Dto;

/** A `PurchaseExpress`'s `kpis`. */
final class PurchaseExpressKpis extends Dto
{
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
