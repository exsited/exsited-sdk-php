<?php

declare(strict_types=1);

namespace Exsited\Resources\Reports\ReportsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The `invoices` object of ReportsInvoicesInvoiceOverview. */
final class ReportsInvoicesInvoiceOverviewInvoices extends Dto
{
    /** @param list<ReportsInvoicesInvoiceOverviewInvoicesInvoiceOverview|null>|null $invoiceOverview */
    public function __construct(
        #[ListOf(ReportsInvoicesInvoiceOverviewInvoicesInvoiceOverview::class)]
        public readonly ?array $invoiceOverview = null,
    ) {
    }
}
