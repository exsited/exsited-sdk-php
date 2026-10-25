<?php

declare(strict_types=1);

namespace Exsited\Resources\Invoices\InvoicesDto;

use Exsited\Client\Dto;

/** What `getInvoiceKpis` answers, under `invoice_kpis`: the block an invoice carries as `kpis`,
 *  with an `object` beside it. */
final class InvoiceKpisRead extends Dto
{
    public const ENVELOPE_KEY = 'invoice_kpis';

    public function __construct(
        public readonly ?string $creditApplied = null,
        public readonly ?string $creditIssued = null,
        public readonly ?string $paymentApplied = null,
        public readonly ?string $lastPaymentDate = null,
        public readonly ?string $lastAmendedOn = null,
        public readonly ?string $lastCancelledOn = null,
        public readonly ?string $lastReactivatedOn = null,
        public readonly ?string $deletedOn = null,
        public readonly ?string $voidedOn = null,
        /** String on 198 blocks, int on 70. Untyped for that reason. */
        public readonly mixed $outstanding = null,
        /** Int on 252 blocks, string on 16. Untyped for that reason. */
        public readonly mixed $overdue = null,
        public readonly ?string $object = null,
    ) {
    }
}
