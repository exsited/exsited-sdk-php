<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Sdk\Client\Dto;

/** The `kpis` object of PurchaseInvoiceInformation. */
final class PurchaseInvoiceInformationKpis extends Dto
{
    public function __construct(
        public readonly ?string $creditApplied = null,
        public readonly ?string $creditIssued = null,
        public readonly mixed $deletedOn = null,
        public readonly mixed $lastAmendedOn = null,
        public readonly mixed $lastCancelledOn = null,
        public readonly mixed $lastPaymentDate = null,
        public readonly mixed $lastReactivatedOn = null,
        public readonly ?string $object = null,
        public readonly ?string $outstanding = null,
        public readonly ?string $overdue = null,
        public readonly ?string $paymentApplied = null,
        public readonly mixed $voidedOn = null,
    ) {
    }
}
