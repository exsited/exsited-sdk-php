<?php

declare(strict_types=1);

namespace Exsited\Resources\Invoices\InvoicesDto;

use Exsited\Client\Dto;

/** The `accounting_code` object of InvoiceReadLine. */
final class InvoiceReadLineAccountingCode extends Dto
{
    public function __construct(
        public readonly mixed $salesRevenue = null,
    ) {
    }
}
